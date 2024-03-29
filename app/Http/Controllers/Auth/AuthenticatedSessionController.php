<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.email' => 'Vous devez saisir une adresse e-mail valide !',
            'email.required' => 'Le champ e-mail est obligatoire.',
            'password.required' => 'Le champ mot de passe est obligatoire.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }
        $request->session()->put('show_testimonial_prompt', true);

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password))
        {
            $user->updateLastLogin();

            if ($user->role === 'admin') {
                Auth::login($user);
                logger('Successful login as admin: ' . $request->input('email'));
                return redirect()->route('admin.dashboard')->with('success', 'Welcome admin '.$user->name .'!');
            }
            else {
                Auth::login($user);
                logger('Successful connection: ' . $request->input('email'));
                return redirect()->route('mail.index')->with('success', 'Bienvenue '.$user->name .' dans votre compte');
            }
        }
        else
        {
            logger('Failed to log in for: ' . $request->input('email'));
            return redirect()->route('login')->with('error', 'L\'email ou le mot de passe est incorrect');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Vous avez été déconnecté avec succès');
    }

    protected function authenticated(Request $request, $user)
    {
        $user->updateLastLogin();

        return redirect()->intended($this->redirectPath());
    }

}
