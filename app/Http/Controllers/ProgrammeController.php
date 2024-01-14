<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Programme;
use App\Models\Secteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgrammeController extends Controller
{

    // list programs
    function index()
    {
        try {
            $programs = Programme::all();
            $programs_candidates = [];
            $programs_secteurs = [];

            foreach ($programs as $program) {
                $programs_candidates[] = [
                    'program' => $program,
                    'candidat' => $program->candidat()->get(),
                    "secteur" => $program->secteur()->get()
                ];
            }

            return response()->json([
                'status' => 'success',
                'programs' => $programs_candidates,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    function create(Request $request)
    {
        try {
            // Validate the incoming request data

            $validated = Validator::make(
                $request->all(),
                [
                    'titre' => 'required|string',
                    'contenu' => 'required|string',
                    'document' => 'required|file|mimes:pdf,doc,docx|max:2048',
                    'candidat_id' => 'required|exists:candidats,id',
                    'secteur_id' => 'exists:secteurs,id'
                ]
            );

            if ($validated->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validated->errors()->first(),
                ]);
            }

            $file = $request->file('document');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/documents'), $fileName);

            $program = new Programme();
            $program->titre = $request->input('titre');
            $program->contenu = $request->input('contenu');
            $program->document = $fileName;
            $program->candidat_id = $request->candidat_id;
            $program->secteur_id = $request->secteur_id;

            $program->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Programme crée avec succès'
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    function update(Request $request, $id)
    {
        try {
            $validated = Validator::make($request->all(), [
                'titre' => 'required|string',
                'contenu' => 'required|string',
                'candidat_id' => 'nullable|exists:candidats,id',
                'secteur_id' => 'nullable|exists:secteurs,id',

                // 'document' => 'required|file|mimes:pdf,doc,docx|max:2048',
            ]);



            if ($validated->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validated->errors()->first(),
                ]);
            }

            // Handle file upload
            // $file = $request->file('document');
            // $fileName = time() . '_' . $file->getClientOriginalName();
            // $file->move(public_path('uploads/documents'), $fileName);


            $program = Programme::find($id);

            // $document_path = public_path('/uploads/documents/' . $program->document);

            // if (file_exists($document_path)) {
            //     unlink($document_path);
            // }

            $program->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Programme modifié avec succès',
                'programme' => $program,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    function delete($id)
    {
        try {
            $program = Programme::find($id);


            $document_path = public_path('uploads/documents/' . $program->document);

            if (file_exists($document_path)) {
                unlink($document_path);
            }

            $program->delete();

            return response()->json([
                'status' => 'success',
                'message' => "Programme supprimé avec succès",
                'program' => $program
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Create programme candidat/secteur dropdown
     */

    function programDropdowns()
    {
        $secteurs = Secteur::all();
        $candidat = Candidat::all();

        return view('admin/program/create', ['secteurs' => $secteurs, 'candidats' => $candidat]);
    }
}
