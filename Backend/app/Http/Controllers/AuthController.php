<!-- Auth Full REST API -->
<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // POST /api / register - Register a new user
    public function register(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    // POST /api / login - Authenticate a user and return a token
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('authToken')->accessToken;
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}

