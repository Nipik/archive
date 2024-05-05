<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mail;
use App\Models\Organism;
use App\Models\Category;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;



class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();

        $activeUsers = User::where('is_active', true)->count();
        $inactiveUsers = $totalUsers - $activeUsers;
        $lastLoggedInUser = User::where('id', '!=', auth()->id())
                                ->whereNotNull('last_login')
                                ->orderBy('last_login', 'desc')
                                ->first();

        $lastLoggedInUserName = $lastLoggedInUser ? $lastLoggedInUser->name : 'N/A';

        $userName = auth()->user()->name;
        $users = User::select('name', 'image', 'role', 'last_login')->get();

        return view('admin.admin_dashboard', compact('totalUsers', 'totalAdmins', 'activeUsers', 'inactiveUsers', 'userName', 'lastLoggedInUserName', 'users'));
    }

    public function detail(Request $request)
    {
        if ($request->cookie('unique_visitor')) {
            $uniqueVisitorsCount = $request->cookie('unique_visitor');
        } else {
            $uniqueVisitorsCount = User::count();
            Cookie::queue('unique_visitor', $uniqueVisitorsCount, 60*24*365); 
        }

        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();

        $activeUsers = User::where('is_active', true)->count();
        $inactiveUsers = User::where('is_active', false)->count();
        $inactiveUsers = $totalUsers - $activeUsers;

        $totalCourriers = Mail::count();

        $totalCategories = Category::count();
        $totalOrganisms = Organism::count();

        $userName = auth()->user()->name;
        $users = User::select('name', 'image', 'role')->get();

        return view('admin.detail', compact('uniqueVisitorsCount', 'totalUsers', 'totalAdmins', 'activeUsers', 'inactiveUsers', 'totalCourriers', 'totalCategories', 'totalOrganisms', 'userName', 'users'));
    }

    public function updatePermissions(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        if ($user->can_manage_documents !== 'user') {
            $user->can_manage_documents = $request->input('can_manage_documents');
            $user->save();
            return redirect()->back()->with('success', 'Permissions mises à jour avec succès.');
        } else {
            return redirect()->back()->with('error', 'Impossible de mettre à jour les permissions pour cet utilisateur.');
        }
    }

}

