<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\ResetPasswordEmail;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('emails.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => trans('L\'email ne correspond pas à aucun compte')]);
        }

        $token = Password::getRepository()->create($user);
        $resetLink = url(route('password.reset', ['token' => $token, 'email' => $user->getEmailForPasswordReset()], false));
        Mail::to($request->email)->send(new ResetPasswordEmail($resetLink));

        return back()->with('status', 'Un email de réinitialisation a été envoyé');
    }
}
