<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $referrals = Auth::user()->referrals()->take(5)->get();
        $notification = Notification::latest()->first();
        
        return view('user.home', compact('referrals', 'notification'));
    }
}
