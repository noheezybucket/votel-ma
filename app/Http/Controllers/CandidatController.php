<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class CandidatController extends Controller
{
    function index()
    {
        try {
            return response()->json([
                'status' => 'success',
                'candidates' => Candidat::all()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    function create(Request $request)
    {
        try {

            $validated = Validator::make($request->all(), [
                'nom' => 'required',
                'prenom' => 'required',
                'partie' => 'required',
                'biographie' => 'required',
                'validate' => 'required',
            ]);


            if ($validated->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validated->errors()->first(),
                ]);
            }

            $candidat = new Candidat();

            $candidat->nom = $request->nom;
            $candidat->prenom = $request->prenom;
            $candidat->partie = $request->partie;
            $candidat->biographie = $request->biographie;
            $candidat->validate = $request->validate;
            $candidat->photo = "mike";

            $candidat->save();

            return redirect('admin/create-candidate')->with('status', 'Candidat ajouté avec succès!');
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    function read($id)
    {
        $candidat = Candidat::find($id);
        return view('candidate/read', ['candidat' => $candidat]);
    }


    function update($id)
    {
        $candidat = Candidat::find($id);
        return view('candidate/update', ['candidat' => $candidat]);
    }

    function update_candidate(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'partie' => 'required',
            'biographie' => 'required',
            'validate' => 'required',

        ]);

        $candidat = Candidat::find($request->id);

        $candidat->nom = $request->nom;
        $candidat->prenom = $request->prenom;
        $candidat->partie = $request->partie;
        $candidat->biographie = $request->biographie;
        $candidat->validate = $request->validate;
        $candidat->photo = $request->nom;

        $candidat->update();

        return redirect('candidate/update/' . $request->id)->with('status', 'Candidat modifié avec succès!');
    }

    function delete($id)
    {
        $candidat = Candidat::find($id);
        return view('candidate/delete', ['candidat' => $candidat]);
    }

    function  delete_candidate(Request $request)
    {
        $candidat = Candidat::find($request->id);

        $candidat->delete();

        return redirect('candidate/list')->with('status', 'Candidat ' . $candidat->prenom . ' ' . $candidat->nom . ' supprimer avec succès!');
    }
}
