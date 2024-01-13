<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Programme;
use Illuminate\Http\Request;

use App\Charts\CandidatesNumber;


class StatisticsController extends Controller
{
    function index(Request $request)
    {
        $candidats = Candidat::pluck('id', 'created_at');

        $programmes = Programme::pluck('id', 'candidat_id');

        $chart1 = new CandidatesNumber;
        $chart1->labels($candidats->keys());
        $chart1->dataset('My dataset 1', 'bar', $candidats->values())->backgroundColor(['#000', '#444']);

        $chart2 = new CandidatesNumber;
        $chart2->labels($programmes->keys());
        $chart2->dataset('My dataset 2', 'doughnut', $programmes->values())->backgroundColor(['#000', '#444']);


        return view('/electeur/stats', compact('chart1', 'chart2'));
    }
}