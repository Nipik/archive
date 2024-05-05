<?php

namespace App\Http\Controllers;

use App\Models\UserAction;

class UserActionController extends Controller
{
    public function index()
    {
        $userActions = UserAction::latest()->paginate(10);

        return view('admin.user_actions', compact('userActions'));
    }
}
