<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAction
{
    public function execute(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Welcome back!');
        } else {
            return redirect()->route('login')->with('error', 'Incorrect email or password');
        }
    }
}
