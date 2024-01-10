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
                'photo' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048'
            ]);


            if ($validated->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validated->errors()->first(),
                ]);
            }

            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/images'), $fileName);

            $candidat = new Candidat();

            $candidat->nom = $request->nom;
            $candidat->prenom = $request->prenom;
            $candidat->partie = $request->partie;
            $candidat->biographie = $request->biographie;
            $candidat->validate = 0;
            $candidat->photo = $fileName;

            $candidat->save();

            return response()->json([
                'status' => 'success',
                'message' => "Candidat ajouté avec succès",
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    function update(Request $request, $id)
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

            $candidat = Candidat::find($id);

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


    function  delete($id)
    {
        try {
            $candidat = Candidat::find($id);
            $candidat->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Utilisateur supprimé avec succès',
                'candidat' => $candidat
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
