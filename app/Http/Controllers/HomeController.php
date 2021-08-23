<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 6000) {
            return redirect()->route('admin.home');
        }
        return redirect()->route('user.home');
    }

    public function creditRef()
    {
        if (Auth::user()->paid_ref ==  1) {
            return redirect()->route('user.home');
        } else {
            if (Auth::user()->referrer) {
                $amount = Setting::where('name', 'ref_payment')->first()->value;
                $ref = Auth::user()->referrer;
                $ref->balance += $amount;
                $ref->save();

                Auth::user()->paid_ref = 1;
                Auth::user()->save();

                $ref->transactions()->create([
                    'amount' => $amount,
                    'type' => 'credit',
                    'status' => 'success'
                ]);
            }

            return redirect()->route('user.home');
        }
    }
}
