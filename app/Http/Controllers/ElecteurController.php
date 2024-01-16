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


    function like(Request $request)
    {
        $programId = $request->program_id;
        $user_id = $request->user_id;

        $like = Like::where('user_id', $user_id)->where('program_id', $programId)->where('like', 1)->first();
        $dislike = Like::where('user_id', $user_id)->where('program_id', $programId)->where('dislike', 1)->first();

        if ($dislike) {
            Like::destroy($dislike->id);
            $like = new Like(['program_id' => $programId, 'user_id' => $user_id, 'like' => 1, 'dislike' => 0]);
            $like->save();

            return response()->json([
                'liked' =>  true,
                'likes' => Like::where('program_id', $programId)->where('like', 1)->get()
            ], 201);
        } else if ($like) {
            Like::destroy($like->id);

            return response()->json([
                'liked' =>  false,
                'likes' => Like::where('program_id', $programId)->where('like', 1)->get()
            ]);
        } else {
            $like = new Like(['program_id' => $programId, 'user_id' => $user_id, 'like' => 1, 'dislike' => 0]);
            $like->save();

            return response()->json([
                'liked' =>  true,
                'likes' => Like::where('program_id', $programId)->where('like', 1)->get()
            ], 201);
        }
    }


    function dislike(Request $request)
    {
        $programId = $request->program_id;
        $user_id = $request->user_id;

        $dislike = Like::where('user_id', $user_id)->where('program_id', $programId)->where('dislike', 1)->first();
        $like = Like::where('user_id', $user_id)->where('program_id', $programId)->where('like', 1)->first();

        if ($like) {
            Like::destroy($like->id);
            $dislike = new Like(['program_id' => $programId, 'user_id' => $user_id, 'like' => 0, 'dislike' => 1]);
            $dislike->save();

            return response()->json([
                'disliked' =>  true,
                'dislikes' => Like::where('program_id', $programId)->where('dislike', 1)->get()
            ], 201);
        } elseif ($dislike) {
            Like::destroy($dislike->id);

            return response()->json([
                'disliked' =>  false,
                'dislikes' => Like::where('program_id', $programId)->where('dislike', 1)->get()
            ]);
        } else {
            $dislike = new Like(['program_id' => $programId, 'user_id' => $user_id, 'like' => 0, 'dislike' => 1]);
            $dislike->save();

            return response()->json([
                'disliked' =>  true,
                'dislikes' => Like::where('program_id', $programId)->where('dislike', 1)->get()
            ], 201);
        }
    }


    function stats()
    {
        $candidats = Candidat::all();

        return view('/electeur/stats', compact('candidat'));
    }
}
