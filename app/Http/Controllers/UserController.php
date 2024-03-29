<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'alpha',
            'lastName' => 'alpha',
            'email' => 'email|unique:users,email,' . $user->id,
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
        ], [
            'name.alpha' => 'Le nom ne doit contenir que des lettres alphabétiques.',
            'lastName.alpha' => 'Le nom de famille ne doit contenir que des lettres alphabétiques.',
            'email.email' => 'Vous devez saisir une adresse e-mail réelle.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée par un autre utilisateur.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'Le fichier doit être de type : png, jpg ou jpeg.',
            'image.max' => 'Le fichier ne doit pas dépasser : 2048 kilobytes.',

        ]);


        if ($validator->fails()) {
            return redirect()->route('admin.edit', $user)->withErrors($validator)->withInput();
        }
        $data = $request->only('name', 'lastName', 'email');
        $this->handleImageUpload($request, $user, $data);
        $user->update($data);
        return redirect()->route('admin.index')->with('success', 'L\'utilisateur a été modifié avec succés');
    }

    protected function handleImageUpload(Request $request, User $user, array &$data)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('image/profile_images', $imageName, 'public');
            $data['image'] = $path;
        }
    }

    public function destroy(User $user)
    {
        if ($user->isAdmin() && User::where('role', 'admin')->count() === 1) {
            return redirect()->back()->with('error', 'Vous êtes le seul administrateur et ne pouvez pas être supprimé.');
        }

        $user->delete();

        return redirect()->route('admin.index')->with('success', 'L\'utilisateur a été supprimé avec succés.');
    }

    public function confirmDelete(User $user)
    {

        return view('admin.confirm-delete', compact('user'));
    }

    public function show(User $user)
    {
        return view('admin.show', compact('user'));
    }

}
