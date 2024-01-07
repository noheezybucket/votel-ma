<?php

namespace App\Http\Controllers;

use App\Models\Secteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SecteurController extends Controller
{
    function index()
    {
        try {
            return response()->json([
                "status" => "success",
                "secteurs" => Secteur::all()
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }

    function create(Request $request)
    {
        try {
            $validated = Validator::make(
                $request->all(),
                [
                    "label" => "required|string",
                    "couleur" => "required|string",
                    // "icon" => "required|string"
                ]
            );

            if ($validated->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validated->errors()->first()
                ], 400);
            }

            $secteur = new Secteur();
            $secteur->label = $request->label;
            $secteur->couleur = $request->couleur;
            // $secteur->icon = $request->icon;

            $secteur->save();

            return response()->json([
                'status' => 'success',
                'message' => "Secteur ajouté avec succès",
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    function update()
    {
    }

    function delete($id)
    {
        try {
            $secteur = Secteur::find($id);

            $secteur->delete();

            return response()->json([
                'status' => 'success',
                'message' => "Secteur supprimé avec succès"
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
