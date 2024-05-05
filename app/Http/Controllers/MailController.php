<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;
use App\Models\Category;
use App\Models\Organism;
use App\Models\UserAction ;


class MailController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $query = Mail::with(['category', 'organism']);

        if ($request->has('reception_date')) {
            $query->whereDate('reception_date', $request->input('reception_date'));
        }
        $query->where('is_deleted', false);

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

        return view('mails.index', compact('mails', 'user'));
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
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileContents = file_get_contents($file->getPathname());
            $fileHash = hash('sha256', $fileContents);
            $existingMail = Mail::where('checksum', $fileHash)->first();

            if ($existingMail) {
                if ($existingMail->is_deleted) {
                    $existingMail->is_deleted = false;
                    $existingMail->subject = $request->input('subject');
                    $existingMail->status = $request->input('status');
                    $existingMail->reception_date = $request->input('reception_date');
                    $existingMail->dispatch_date = $request->input('dispatch_date');
                    $existingMail->source = $request->input('source');
                    $existingMail->organism_id = $request->input('organism_id');
                    $existingMail->category()->sync($request->input('category_id'));
                    $existingMail->save();
                    $user = auth()->user();
                    if (!$existingMail->users->contains($user->id)) {
                        $existingMail->users()->attach($user->id);
                    }

                    UserAction::create([
                        'user_id' => $user->id,
                        'action_type' => 'ajout',
                        'mail_id' => $existingMail->id,
                    ]);

                    return redirect()->route('mail.index')->with('success', 'Le courrier a été ajouté avec succès.');
                } else {
                    return redirect()->back()->with('error', 'Le fichier existe déjà dans la liste des courriers !');
                }
            }

                $filePath = $file->store('mails', 'public');
                $mail = new Mail();
                $mail->subject = $request->input('subject');
                $mail->status = $request->input('status');
                $mail->file_path = $filePath;
                $mail->reception_date = $request->input('reception_date');
                $mail->dispatch_date = $request->input('dispatch_date');
                $mail->source = $request->input('source');
                $mail->organism_id = $request->input('organism_id');
                $mail->checksum = $fileHash;
                $mail->save();
                $mail->category()->attach($request->input('category_id'));
                $user = auth()->user();
                if (!$mail->users->contains($user->id)) {
                    $mail->users()->attach($user->id);
                }

                UserAction::create([
                    'user_id' => $user->id,
                    'action_type' => 'ajout',
                    'mail_id' => $mail->id,
                ]);

                return redirect()->route('mail.index')->with('success', 'Le courrier a été ajouté avec succès');
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
            'subject' => 'required|string|max:255',
            'status' => 'required|string|max:100',
            'reception_date' => 'required|date',
            'dispatch_date' => 'required|date',
            'source' => 'required|string|max:255',
            'file' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:category,id',
            'organism_id' => 'required|exists:organisms,id',
        ],[
            'reception_date.required' => 'Le champ de réception est obligatoire.',
            'reception_date.date' => 'Le champ de réception doit contenir une date valide.',
            'dispatch_date.required' => 'Le champ de date d\'expédition est obligatoire.',
            'dispatch_date.date' => 'Le champ de date d\'expédition doit contenir une date valide.',
            'source.required' => 'Le champ source est obligatoire.',
            'file.mimes' => 'Le fichier doit être de type : pdf, jpg, jpeg ou png.',
            'file.max' => 'La taille maximale du fichier est de 2048 Ko.',
            'category_id.required' => 'La catégorie est obligatoire.',
            'category_id.exists' => 'La catégorie sélectionnée est invalide.',
            'organism_id.required' => 'L\'organisme est obligatoire.',
            'organism_id.exists' => 'L\'organisme sélectionné est invalide.',
        ]);

        $mail = Mail::findOrFail($id);
        if ($mail->is_deleted) {
            return redirect()->back()->with('error', 'Le courrier est supprimé et ne peut pas être modifié.');
        }

        $mail->subject = $validatedData['subject'];
        $mail->status = $validatedData['status'];
        $mail->reception_date = $validatedData['reception_date'];
        $mail->dispatch_date = $validatedData['dispatch_date'];
        $mail->source = $validatedData['source'];
        $mail->organism_id = $validatedData['organism_id'];

        UserAction::create([
            'user_id' => auth()->id(),
            'action_type' => 'modification',
            'mail_id' => $mail->id,
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileContents = file_get_contents($file->getPathname());
            $fileHash = hash('sha256', $fileContents);
            $existingMail = Mail::where('checksum', $fileHash)
                                ->where('id', '!=', $mail->id)
                                ->first();
            if ($existingMail) {
                return redirect()->back()->with('error', 'Le fichier existe déjà dans un autre courrier!');
            }

            $filePath = $file->store('mails', 'public');
            $mail->file_path = $filePath;
            $mail->checksum = $fileHash;
        }
        if ($request->has('category_id')) {
            $mail->category()->sync([$validatedData['category_id']]);
        }
        $mail->save();
        return redirect()->route('mail.index')->with('success', 'Le courrier a été modifié avec succès.');
    }

    public function destroy($id)
    {
        try {
            $mail = Mail::find($id);
            if ($mail) {
                $mail->is_deleted = true;
                $mail->save();
                UserAction::create([
                    'user_id' => auth()->id(),
                    'action_type' => 'suppression',
                    'mail_id' => $mail->id,
                ]);

                return redirect()->route('mail.index')->with('success', 'Courrier supprimé avec succès.');
            } else {
                return redirect()->route('mail.index')->with('error', 'Courrier non trouvé.');
            }
        } catch (\Exception $e) {
            return redirect()->route('mail.index')->with('error', 'Erreur lors de la suppression du courrier.');
        }
    }
    public function show($id)
    {
        $mail = Mail::findOrFail($id);
        UserAction::create([
            'user_id' => auth()->id(),
            'action_type' => 'vue',
            'mail_id' => $mail->id,
        ]);
        return view('mails.show', compact('mail'));
    }
    function calculateChecksum($filePath)
    {
        return hash_file('sha256', $filePath);
    }
    public function showDeletedMails()
    {
        $deletedMails = Mail::where('is_deleted', true)->get();
        return view('admin.deletedMails', compact('deletedMails'));
    }
    public function deletePermanently($id)
    {
        $mail = Mail::find($id);
        if ($mail) {
            $mail->delete();
            return redirect()->route('mail.deleted')->with('success', 'Courrier supprimé définitivement.');
        } else {
            return redirect()->route('mail.deleted')->with('error', 'Courrier non trouvé.');
        }
    }
    public function showDeleted($id)
    {
        $mail = Mail::where('id', $id)->where('is_deleted', true)->first();

        if (!$mail) {
            return redirect()->route('mail.deleted')->with('error', 'Courrier non trouvé');
        }

        return view('admin.showDeletedMails', ['mail' => $mail]);
    }

}
