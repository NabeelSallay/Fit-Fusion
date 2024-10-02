<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {

        $users = User::all();
        $clients = User::where('role', 'client')->get();
        $coaches = User::where('role', 'coach')->get();
        return view('admin_dashboard', compact('users'));
    }

}
