<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[^\d]+$/u',
                Rule::unique('category')->where(function ($query) use ($request) {
                    return $query->where('name', $request->name);
                }),
            ],
        ], [
            'name.unique' => 'Le nom de catégorie existe déja',
            'name.regex' => 'Le nom de catégorie n\'accepte pas les nombres',
        ]);

        Category::create($validatedData);
        return redirect()->route('category.index')->with('success', 'La catégorie a été ajouté avec succés');
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'La catégorie a été supprimé avec succés');
    }
    public function archive()
    {
        $categories = Category::with('mails')->get();
        return view('archive.category', compact('categories'));
    }
    public function showCategoryMails($id)
    {
        $category = Category::with('mails')->findOrFail($id);
        return view('archive.show', compact('category'));
    }

}
