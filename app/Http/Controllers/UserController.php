<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Setting;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $referrals = Auth::user()->referrals()->take(5)->get();
        $notification = Notification::latest()->first();
        $countdown = Setting::where('name', 'countdown')->first()->value;
        $times = \Carbon\Carbon::parse($countdown)->isPast();


        return view('user.home', compact('referrals', 'notification', 'countdown'));
    }


    public function referrals()
    {
        $referrals = Auth::user()->referrals()->paginate(10);

        return view('user.referrals', compact('referrals'));
    }


    public function withdraw()
    {
        $countdown = Setting::where('name', 'countdown')->first()->value;

        if (!\Carbon\Carbon::parse($countdown)->isPast()) {
            //return back()->with(['error' => 'Countdown has not ended yet']);
        }

        if (Auth::user()->referrals->count() < 4) {
            return back()->with(['error' => 'You did not meet up the required number of referrals']);
        }

        if (Auth::user()->balance == 0) {
            return back()->with(['error' => 'Your wallet is currently empty']);
        }

        Auth::user()->transactions()->create([
            'amount' => Auth::user()->balance,
            'status' => 'pending',
            'type' => 'debit'
        ]);

        Auth::user()->balance = 0;
        Auth::user()->save();

        return back()->with(['success' => 'Withdrawal request created successfully and is being attended to currently']);


    }
}
