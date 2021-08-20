<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $referrals = Auth::user()->referrals()->take(5);
        
        return view('user.home', compact('referrals'));
    }
}
