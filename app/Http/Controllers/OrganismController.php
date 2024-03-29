<?php

namespace App\Http\Controllers;

use App\Models\Organism;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrganismController extends Controller
{
    public function index(){
        $organisms = Organism::all();
        return view('organism.index', compact('organisms'));
    }

    public function create(){
        return view('organism.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:organisms',
            'address' => 'required|string|max:255',
            'fax' => 'required|string|max:255',
            'tel' => ['nullable', 'string', 'max:255', 'regex:/^\+?[0-9\s\-()]+$/'],
        ], [
            'name.unique' => 'Le nom de l\'organisme existe déjà.',
            'tel.regex' => 'Le numéro de téléphone doit être au format valide.',

        ]);

        Organism::create($validatedData);
        return redirect()->route('organisms.index')->with('success', 'L\'organisme a été créé avec succès. ');
    }

        public function edit($id){
        $organism = Organism::findOrFail($id);
        return view('organism.edit', compact('organism'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => [
                'string',
                'max:255',
                Rule::unique('organisms')->ignore($id),
            ],
            'address' => 'string|max:255',
            'fax' => 'string|max:255',
            'tel' => ['nullable', 'string', 'max:255', 'regex:/^\+?[0-9\s\-()]+$/'],
        ], [
            'tel.regex' => 'Le numéro de téléphone doit être au format valide.',
            'address.string' => 'L\'adresse doit etre une chaine de caractére',
        ]);

        $organism = Organism::findOrFail($id);
        $organism->update($validatedData);
        return redirect()->route('organisms.index')->with('success', 'L\'organisme a été modifié avec succés');
    }

    public function destroy($id){
        $organism = Organism::findOrFail($id);
        $organism->delete();
        return redirect()->route('organisms.index')->with('success', 'L\'organisme a été supprimé avec succés');
    }
    public function show($id)
    {
        $organism = Organism::findOrFail($id);
        return view('organism.show', compact('organism'));
    }
}
