<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create(Request $request)
    {
        $user = Auth::user();
        return view('admin.add');
    }

    protected function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha',
            'lastName'=>'required|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'name.required' => 'Le champ nom est requis',
            'lastName.required' => 'Le champ nom est requis',
            'lastName.alpha' => 'Le nom ne doit contenir que des lettres alphabétiques',
            'name.alpha' => 'Le nom ne doit contenir que des lettres alphabétiques',
            'email.email' => 'Vous devez utiliser une adresse e-mail réelle',
            'email.unique' => 'L\'e-mail que vous avez utilisé existe déjà',
            'email.required' => 'Le champ e-mail est requis',
            'password.required' => 'Le champ mot de passe est requis',
            'password.string' => 'Le mot de passe doit contenir des caractères',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'image.required' => 'Le champ image est requis',
            'image.image' => 'Le fichier doit être une image',
            'image.mimes' => 'Le fichier doit être de type : jpeg, png, jpg',
            'image.max' => 'Le fichier ne doit pas dépasser : 2048 kilo-octets',

        ]);

        if ($validator->fails()) {
            return redirect()->route('add')->withErrors($validator)->withInput();
        }

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
        }

        User::create([
            'name' => $request->input('name'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.index')->with('success', 'Un nouveau utilisateur a été ajouté avec succés!');
    }
}
