<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $request->session()->regenerate();

        $user = Auth::user();
        $user->is_super_admin = $user->hasRole('super-admin');
        $user->is_client = $user->hasRole('client');

        return response()->json([
            'message' => 'Login realizado com sucesso',
            'user' => $user
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logout realizado']);
    }

    public function me(Request $request)
    {
        $user = $request->user();
        $user->is_super_admin = $user->hasRole('super-admin');
        $user->is_client = $user->hasRole('client');

        return response()->json($user);
    }
}
