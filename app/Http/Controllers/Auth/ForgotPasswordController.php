<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Notifications\ResetPasswordNotification;
use App\Http\Controllers\Controller;
use App\Models\User;

use function Psy\debug;
use Illuminate\Support\Facades\Notification;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' =>  [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
            ],
        ],[
            'email.required' => 'O campo email é obrigatório.',
            'email.lowercase' => 'O campo email deve estar em minúsculas.',
            'email.email' => 'O campo email deve ser um endereço de e-mail válido.',
            'email.max' => 'O campo email não deve ter mais de :max caracteres.',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                Notification::send($user, new ResetPasswordNotification($user->createToken('Password Reset')));
            } else {
                \Log::error('User not found: ' . $request->email);
            }
        }

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => __($status)], 200)
            : response()->json(['message' => __($status)], 400);
    }
}
