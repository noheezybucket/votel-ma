<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Register user
     */
    public function register(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                "fullname" => "required|string",
                "cni" => "required|numeric|unique:users",
                "password" => "required|string",
                "role" => "required|in:admin,electeur"
            ]);

            if ($validated->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validated->errors()->first()
                ], 400);
            }

            $user = User::create([
                'fullname' => $request->fullname,
                'cni' => $request->cni,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);

            $token = Auth::login($user);

            return response()->json([
                'status' => 'success',
                'message' => 'Utilisateur créer avec succès',
                'user' => $user,
                'authorization' => [
                    'token' => $token,
                    'type' => 'bearer'
                ]
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * login user
     */
    public function login(Request $request)
    {
        try {
            $validated = Validator::make(request()->all(), [
                'cni' => 'required|numeric',
                'password' => 'required|string',
            ]);

            if ($validated->fails())
                return response()->json(['status' => 'error', 'message' => $validated->errors()->first()], 400);

            $credentials = $request->only('cni', 'password');
            $token = Auth::attempt($credentials);

            if (!$token) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized',
                ], 401);
            }

            $user = Auth::user();

            return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorization' => [
                    'token' => $token,
                    'type' => 'bearer',
                ],
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
