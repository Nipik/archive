<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mail;
use App\Models\UserAction;
use Illuminate\Http\JsonResponse;

class MailApiController extends Controller
{
    public function index(Request $request): JsonResponse
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
        $query->where('is_deleted', false);
        $mails = $query->get();

        return response()->json($mails);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'status' => 'required|string|max:100',
            'reception_date' => 'nullable|date',
            'dispatch_date' => 'nullable|date',
            'source' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
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
                    UserAction::create([
                        'user_id' => auth()->id(),
                        'action_type' => 'ajout',
                        'mail_id' => $existingMail->id,
                    ]);

                    return response()->json(['success' => 'Le courrier a été mis à jour avec succès.']);
                } else {
                    return response()->json(['error' => 'Le fichier existe déjà dans la liste des courriers.'], 400);
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
            UserAction::create([
                'user_id' => auth()->id(),
                'action_type' => 'ajout',
                'mail_id' => $mail->id,
            ]);

            return response()->json(['success' => 'Le courrier a été ajouté avec succès']);
        } else {
            return response()->json(['error' => 'Le fichier n\'a pas été téléchargé.'], 400);
        }
    }
    public function show($id): JsonResponse
    {
        $mail = Mail::findOrFail($id);
        UserAction::create([
            'user_id' => auth()->id(),
            'action_type' => 'vue',
            'mail_id' => $mail->id,
        ]);
        return response()->json($mail);
    }
    public function update(Request $request, $id): JsonResponse
    {
        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'status' => 'required|string|max:100',
            'reception_date' => 'required|date',
            'dispatch_date' => 'required|date',
            'source' => 'required|string|max:255',
            'file' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'organism_id' => 'required|exists:organisms,id',
        ]);

        $mail = Mail::findOrFail($id);
        if ($mail->is_deleted) {
            return response()->json(['error' => 'Le courrier est supprimé et ne peut pas être modifié.'], 400);
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
                return response()->json(['error' => 'Le fichier existe déjà dans un autre courrier !'], 400);
            }
            $filePath = $file->store('mails', 'public');
            $mail->file_path = $filePath;
            $mail->checksum = $fileHash;
        }
        if ($request->has('category_id')) {
            $mail->category()->sync([$validatedData['category_id']]);
        }

        $mail->save();

        return response()->json(['success' => 'Le courrier a été mis à jour avec succès.']);
    }
    public function destroy($id): JsonResponse
    {
        $mail = Mail::find($id);

        if (!$mail) {
            return response()->json(['error' => 'Courrier non trouvé.'], 404);
        }
        $mail->is_deleted = true;
        $mail->save();
        UserAction::create([
            'user_id' => auth()->id(),
            'action_type' => 'suppression',
            'mail_id' => $mail->id,
        ]);

        return response()->json(['success' => 'Courrier supprimé avec succès.']);
    }
    public function showDeletedMails(): JsonResponse
    {
        $deletedMails = Mail::where('is_deleted', true)->get();
        return response()->json($deletedMails);
    }
    public function restore($id): JsonResponse
    {
        $mail = Mail::findOrFail($id);

        if (!$mail->is_deleted) {
            return response()->json(['error' => 'Le courrier n\'est pas supprimé.'], 400);
        }

        // Restaurer le courrier
        $mail->is_deleted = false;
        $mail->save();
        UserAction::create([
            'user_id' => auth()->id(),
            'action_type' => 'restauration',
            'mail_id' => $mail->id,
        ]);

        return response()->json(['success' => 'Courrier restauré avec succès.']);
    }
    public function deletePermanently($id): JsonResponse
    {
        $mail = Mail::find($id);

        if (!$mail) {
            return response()->json(['error' => 'Courrier non trouvé.'], 404);
        }
        $mail->category()->detach();
        $mail->delete();

        UserAction::create([
            'user_id' => auth()->id(),
            'action_type' => 'suppression définitive',
            'mail_id' => $mail->id,
        ]);

        return response()->json(['success' => 'Courrier supprimé définitivement avec succès.']);
    }
    public function showDeleted($id): JsonResponse
    {
        $mail = Mail::where('is_deleted', true)->findOrFail($id);

        return response()->json($mail);
    }
}

