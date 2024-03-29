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
        $inactiveUsers = User::where('is_active', false)->count();
        $inactiveUsers = $totalUsers - $activeUsers;

        $userName = auth()->user()->name;
        $users = User::select('name', 'image', 'role', 'last_login')->get();

        return view('admin.admin_dashboard', compact('totalUsers', 'totalAdmins', 'activeUsers', 'inactiveUsers', 'userName', 'users'));
    }


    public function detail(Request $request)
    {
        if ($request->cookie('unique_visitor')) {
            $uniqueVisitorsCount = $request->cookie('unique_visitor');
        } else {
            $uniqueVisitorsCount = User::count();
            Cookie::queue('unique_visitor', $uniqueVisitorsCount, 60*24*365); // 1 an
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



}

