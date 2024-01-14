<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function register(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                "fullname" => "required|string",
                "cni" => "required|numeric",
                "password" => "required|string",
                "role" => "required"
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function login(Request $request)
    {
    }

    function forgotPassword()
    {
    }
}
