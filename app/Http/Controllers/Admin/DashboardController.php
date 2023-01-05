<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('Admin.users.index', compact('users'));
    }
    public function viewUser($id)
    {
        $users = User::find($id);
        return view('Admin.users.view', compact('users'));
    }
}
