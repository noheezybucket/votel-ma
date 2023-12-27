<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;

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

    function create()
    {
        return view('candidate/create');
    }

    function create_candidate(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'partie' => 'required',
            'biographie' => 'required',
            'validate' => 'required',

        ]);

        $candidat = new Candidat();

        $candidat->nom = $request->nom;
        $candidat->prenom = $request->prenom;
        $candidat->partie = $request->partie;
        $candidat->biographie = $request->biographie;
        $candidat->validate = $request->validate;
        $candidat->photo = "mike";

        $candidat->save();

        return redirect('candidate/create')->with('status', 'Candidat ajouté avec succès!');
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
