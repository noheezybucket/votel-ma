<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    // list programs
    function index()
    {
        try {
            return response()->json([
                'status' => 'success',
                'programs' => Programme::all()
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
            $request->validate([
                'titre' => 'required|string',
                'contenu' => 'required|string',
                'document' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust allowed file types and size as needed
            ]);

            // Handle file upload
            $file = $request->file('document');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/documents'), $fileName);

            // Save other form data to the database or perform other actions as needed
            // For example, assuming you have a Model called Program:

            $program = new Programme();
            $program->titre = $request->input('titre');
            $program->contenu = $request->input('contenu');
            $program->document = $fileName; // Save the file name in the database

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

    function update()
    {
    }

    function delete()
    {
    }
}
