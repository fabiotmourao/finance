<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|string|lowercase',
            'password' => 'required|min:8',
        ],[
            'email.required' => 'O campo email é obrigatório.',
            'email.lowercase' => 'O campo email deve estar em minúsculas.',
            'email.email' => 'O campo email deve ser um endereço de e-mail válido.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve conter no mínimo 8 dígitos.',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json(['message' => 'Autenticação bem-sucedida', 'user' => $user]);
        } else {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logout successful']);
    }
}
