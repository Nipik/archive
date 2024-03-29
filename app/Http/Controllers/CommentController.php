<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function submitComment(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'comment' => 'required|string',
        ]);

        $emailContent = "Email: " . $request->input('email') . "\n\n" . $request->comment;

        Mail::raw($emailContent, function($message) use ($request) {
            $message->to('doctrack.info@gmail.com');
            $message->subject('Nouveau commentaire de '.$request->input('name'));
            $message->from($request->input('email'), $request->input('name'));
        });

        return redirect()->back()->with('success', 'Votre commentaire a été envoyé avec succès.');
    }
}

?>
