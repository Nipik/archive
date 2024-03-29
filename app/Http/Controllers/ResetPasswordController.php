<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param  string  $token
     * @return \Illuminate\View\View
     */
    public function showResetForm($token)
    {
        return view('emails.reset', ['token' => $token]);
    }

    /**
     * Reset the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
        });

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', 'Votre mot de passe a été réinitialisé avec succès');
        } else {
            return back()->withErrors(['email' => trans($status)]);
        }
    }
}
