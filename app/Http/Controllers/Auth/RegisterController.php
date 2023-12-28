<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{

    public function register(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
                'password' => [
                    'required',
                    'confirmed',
                    'min:8',
                    Rules\Password::defaults(),
                ]
            ],[
                'name.required' => 'O campo nome é obrigatório.',
                'email.required' => 'O campo email é obrigatório.',
                'email.lowercase' => 'O campo email deve estar em minúsculas.',
                'email.email' => 'O campo email deve ser um endereço de e-mail válido.',
                'email.max' => 'O campo email não deve ter mais de :max caracteres.',
                'email.unique' => 'O endereço de e-mail já está em uso.',
                'password.required' => 'O campo senha é obrigatório.',
                'password.min' => 'A senha deve conter no mínimo 8 dígitos.',
                'password.confirmed' => 'A confirmação da senha não coincide.',
            ]);
        } catch (ValidationException $e) {
            \Log::error('Erro de validação:', ['errors' => $e->errors()]);

            return response()->json([
                'message' => 'Erro ao registrar Usuário',
                'errors' => $e->errors(),
            ], 401);
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return response()->json(['message' => 'Usuário registrado com sucesso'], 200);
    }

}
