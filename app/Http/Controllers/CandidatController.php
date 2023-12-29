<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            $candidat->photo = "default";

            $candidat->save();

            return redirect('admin/create-candidate')->with('status', 'Candidat ajouté avec succès!');
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    function update(Request $request, Candidat $candidat)
    {
        try {
            $validated = Validator::make($request->all(), [
                'nom' => 'required',
                'prenom' => 'required',
                'partie' => 'required',
                'biographie' => 'required',
            ]);

            if ($validated->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validated->errors()->first(),
                ]);
            }


            $candidat->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Candidat modifié avec succès',
                'candidat' => $candidat,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    function  delete(Candidat $candidat)
    {
        try {
            $candidat->delete();
            return response()->json([
                'status' => 'succeess',
                'message' => 'Utilisateur supprimé avec succès',
                'candidate' => $candidat
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }

        return redirect('candidate/list')->with('status', 'Candidat ' . $candidat->prenom . ' ' . $candidat->nom . ' supprimer avec succès!');
    }
}
