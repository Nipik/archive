<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Organism;

class MailController extends Controller
{
    public function index(Request $request)
    {
        $query = Mail::with(['category', 'organism']);

        if ($request->has('reception_date')) {
            $query->whereDate('reception_date', $request->input('reception_date'));
        }

        if ($request->has('dispatch_date')) {
            $query->whereDate('dispatch_date', $request->input('dispatch_date'));
        }

        if ($request->has('category_id')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('id', $request->input('category_id'));
            });
        }

        if ($request->has('organism_id')) {
            $query->where('organism_id', $request->input('organism_id'));
        }

        $mails = $query->get();

        return view('mails.index', compact('mails'));
    }

    public function create()
    {
        $category = Category::all();
        $organisms = Organism::all();
        return view('mails.create', compact('category', 'organisms'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'status' => 'string|max:100',
            'reception_date' => 'nullable|date',
            'dispatch_date' => 'nullable|date',
            'source' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:category,id',
            'organism_id' => 'required|exists:organisms,id',
        ], [
            'subject.required' => 'Le champ sujet est requis.',
            'reception_date.date' => 'Le champ de date de réception doit être une date valide.',
            'dispatch_date.date' => 'Le champ de date d\'expédition doit être une date valide.',
            'file.required' => 'Le champ fichier est requis.',
            'file.mimes' => 'Le fichier doit être de type : pdf, jpg, jpeg ou png.',
            'file.max' => 'La taille maximale du fichier est de 2048 Ko.',
            'category_id.required' => 'Le champ catégorie est requis.',
            'category_id.exists' => 'La catégorie sélectionnée est invalide.',
            'organism_id.required' => 'Le champ organisme est requis.',
            'organism_id.exists' => 'L\'organisme sélectionné est invalide.',

        ]);
        //dd($validatedData);
        $userId = Auth::id();

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $filePath = $file->store('mails', 'public');

            $mail = new Mail();
            $mail->subject = $request->input('subject');
            $mail->status = $request->input('status');
            $mail->file_path = $filePath;
            $mail->reception_date = $request->input('reception_date');
            $mail->dispatch_date = $request->input('dispatch_date');
            $mail->source = $request->input('source');
            $mail->organism_id = $request->input('organism_id');
            $mail->save();
            $mail->category()->attach($request->input('category_id'));

            return redirect()->route('mail.index')->with('success', 'Le courrier a été ajouté avec succés');
        } else {
            return redirect()->back()->with('error', 'Le fichier n\'a pas été téléchargé.');
        }
    }

    public function edit($id)
    {
        $mail = Mail::findOrFail($id);
        $category = Category::all();
        $organisms = Organism::all();
        return view('mails.edit', compact('mail', 'category', 'organisms'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subject' => 'string|max:255',
            'status' => 'string|max:100',
            'reception_date' => 'nullable|date',
            'dispatch_date' => 'nullable|date',
            'source' => 'string|max:255',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'category_id' => 'exists:category,id',
            'organism_id' => 'exists:organisms,id',
        ],[
            'reception_date.date' => 'Le champ de réception doit contenir une date valide.',
            'dispatch_date.date' => 'Le champ de date d\'expédition doit contenir une date valide.',
            'file.required' => 'Le champ fichier est requis.',
            'file.mimes' => 'Le fichier doit être de type : pdf, jpg, jpeg ou png.',
            'file.max' => 'La taille maximale du fichier est de 2048 Ko.',
            'category_id.exists' => 'La catégorie sélectionnée est invalide.',
            'organism_id.exists' => 'L\'organisme sélectionné est invalide.',

        ]);

        $mail = Mail::findOrFail($id);
        $mail->subject = $request->input('subject');
        $mail->status = $request->input('status');
        $mail->reception_date = $request->input('reception_date');
        $mail->dispatch_date = $request->input('dispatch_date');
        $mail->source = $request->input('source');
        $mail->organism_id = $request->input('organism_id');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('mails', 'public');
            $mail->file_path = $filePath;
        }
        $mail->category()->sync([$request->input('category_id')]);

        $mail->save();

        return redirect()->route('mail.index')->with('success', 'Le courrier a été modifié avec succés');
    }

    public function destroy($id)
    {
        $mail = Mail::findOrFail($id);
        $mail->delete();
        return redirect()->route('mail.index')->with('success', 'Le courrier a été supprimé avec succés');
    }

    public function show($id)
    {
        $mail = Mail::findOrFail($id);
        return view('mails.show', compact('mail'));
    }
}
