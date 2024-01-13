<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Programme;
use Illuminate\Http\Request;

class ElecteurController extends Controller
{
    function candidates_list()
    {
        return view('electeur/candidates', ['candidats' => Candidat::all()]);
    }

    function view_candidate($id)
    {
        $candidate = Candidat::with('programmes')->find($id);

        return view('electeur/view-candidate', ['candidat' => $candidate]);
    }

    function programs_list()
    {
        return view('electeur/programs', ['programs' => Programme::all()]);
    }

    function view_program($id)
    {
        $program = Programme::with('candidat')->find($id);

        return view('electeur/view-program', ['programme' => $program]);
    }
}
