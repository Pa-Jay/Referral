<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller

{
    public function home(){
        $users = User::latest()->get();
        $wallet_balance = $users->sum('balance');

        return view('admin.home', compact('users', 'wallet_balance'));
    }


    public function users()
    {
        $users = User::latest()->paginate(20);

        return view('admin.users', compact('users'));
    }
}

