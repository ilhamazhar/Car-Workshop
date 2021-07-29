<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate user before register
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:4',
        ]);

        // Register a user
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        // Return message after user created 
        return response()->json(['message' => 'You are registered.']);
    }

    public function login(Request $request)
    {
        // Validate user before login
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:4',
        ]);

        // Create a token
        // $token = auth()->attempt($request->only('email', 'password'));
        $token = Auth::attempt($request->only('email', 'password'));
        
        // If doesn't token
        if (!$token) {
            return response(null, 401);
        }

        // Return token after user login
        return response()->json(compact('token'));
    }

    public function logout(Request $request)
    {
        // Destroy the token
        // auth()->logout();
        Auth::logout();

        // Return message after user logout 
        return response()->json(['message' => 'You are has been logout']);
    }
}
