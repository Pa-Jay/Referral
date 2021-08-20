<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $referrals = Auth::user()->referrals()->take(5)->get();
        $notification = Notification::latest()->first();
        $countdown = Setting::where('name', 'countdown')->first()->value;
        return view('user.home', compact('referrals', 'notification', 'countdown'));
    }


    public function referrals()
    {
        $referrals = Auth::user()->referrals()->paginate(10);

        return view('user.referrals', compact('referrals'));
    }
}
