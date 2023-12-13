<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;

class CandidatController extends Controller
{
    function index()
    {
        return view('candidats/list', ['candidats' => Candidat::all()]);
    }

    function create(Request $request)
    {
        // $request->validate([
        //     'nom' => 'required',
        //     'prenom' => 'required',
        //     'partie' => 'required',
        //     'biographie' => 'required',
        //     'validate' => 'required',
        //     'photo' => 'required',
        // ]);

        // $candidat = new Candidat();

        // $candidat->nom = $request->nom;
        // $candidat->prenom = $request->prenom;
        // $candidat->save();


        return view('candidats/create');
    }
}
