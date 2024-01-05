<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request, $token, $email)
    {

        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|confirmed|min:8',

        ],
        [
           'password.required' => 'O campo senha é obrigatório.',
           'password.min' => 'A senha deve conter no mínimo 8 dígitos.',
           'password_confirmation.confirmed' => 'A confirmação da senha não coincide.',
           'password_confirmation.required' => 'O campo confirme sua senha é obrigatório.',
           'password_confirmation.min' => 'A senha deve conter no mínimo 8 dígitos.',

        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status == Password::PASSWORD_RESET
            ? response()->json(['message' => __($status)], 200)
            : response()->json(['message' => __($status)], 400);
    }
}
