<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mail;

class UserMailController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $mails = $user->mails()
            ->where('mail.is_deleted', false)
            ->distinct()
            ->get()
            ->unique('id');

        return view('auth.mail', compact('mails'));
    }
}
