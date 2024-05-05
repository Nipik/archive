<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('auth.profil',['user' => $user]);
    }
    public function update(Request $request, User $user)
    {
        if (auth()->id() !== $user->id) {
            return redirect()->route('profile')->withErrors([
                'id' => 'L\'ID de l\'utilisateur ne correspond pas à l\'utilisateur actuellement connecté.'
            ]);
        }
        $validator = Validator::make($request->all(), [
            'name' => ['nullable', 'alpha'],
            'lastName' => ['nullable', 'alpha'],
            'email' => ['nullable', 'email', Rule::unique('users')->ignore($user->id)],
            'current_password' => ['required_with:new_password', 'current_password'],
            'new_password' => ['nullable', 'min:8'],
            'confirm_password' => ['nullable', 'required_with:new_password'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ], [
            'current_password.required_with' => 'Le mot de passe actuel est requis lors de la modification du mot de passe.',
            'current_password.current_password' => 'Le mot de passe actuel est incorrect.',
            'image.image' => 'L\'image de profil doit être un fichier image.',
            'image.mimes' => 'Le fichier doit être de type jpeg, png ou jpg.',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 2 Mo.'
        ]);
        if ($validator->fails()) {
            return redirect()->route('profile', $user)->withErrors($validator)->withInput();
        }
        $data = $request->only('name', 'lastName', 'email');
        if ($request->filled('new_password')) {
            $data['password'] = Hash::make($request->input('new_password'));
        }
        if ($request->hasFile('image')) {
            $data['image'] = $this->handleImageUpload($request);
        }
        $user->update($data);
        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès.');
    }
    protected function handleImageUpload(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images/profile_images', $imageName, 'public');
            return $path;
        }
        return null;
    }
}
