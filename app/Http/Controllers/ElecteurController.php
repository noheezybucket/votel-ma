<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Like;
use App\Models\Programme;
use App\Models\User;
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

        $programmes = [];

        foreach ($candidate->programmes as $programme) {
            $programmes[] = ["secteur" => $programme->secteur()->get(), "programme" => $programme];
        }

        return view('electeur/view-candidate', ['candidat' => $candidate, 'programmes' => $programmes]);
    }

    function programs_list()
    {
        return view('electeur/programs', ['programs' => Programme::all()]);
    }

    function view_program($id)
    {
        $program = Programme::with('candidat', 'likes')->find($id);
        $likes = $program->likes_count();
        $dislikes = $program->dislikes_count();
        return view('electeur/view-program', ['programme' => $program, 'likes' => $likes, 'dislikes' => $dislikes]);
    }


    function likeDislike(Request $request)
    {
        $programId = $request->program;
        $user_id = $request->user_id;

        $program = Programme::with('likes')->find($programId);
        $likes = $program->likes_count();
        $dislikes = $program->dislikes_count();


        $user = User::find($user_id);

        // Check if the user has already liked or disliked the program
        if ($request->type === 'like') {
            $data = new Like;
            $data->program_id = $programId;
            $data->like = 1;
            $data->save();

            return response()->json([
                'status' => 'Liked successfully',
                'likes' => $likes,
                'dislikes' => $dislikes,
            ]);
        } elseif ($request->type === 'dislike') {
            $data = new Like;
            $data->program_id = $programId;
            $data->dislike = 1;
            $data->save();
            return response()->json([
                'status' => 'Disliked successfully',
                'likes' => $likes,
                'dislikes' => $dislikes,
            ]);
        }

        return response()->json([
            'message' => 'Vous avez déjà effectuer cet action'
        ]);
    }


    function stats()
    {
        $candidats = Candidat::all();

        dd($candidats);

        return view('/electeur/stats', compact('candidat'));
    }
}
