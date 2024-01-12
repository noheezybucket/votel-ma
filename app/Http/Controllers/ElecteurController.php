<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;

class ElecteurController extends Controller
{
    function index()
    {
        return view('electeur/candidates', ['candidats' => Candidat::all()]);
    }

    function show($id)
    {
    }
}
