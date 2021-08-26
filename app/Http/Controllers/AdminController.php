<?php

namespace App\Http\Controllers;

use App\Setting;
use App\User;
use App\WalletTxn;
use Illuminate\Http\Request;

class AdminController extends Controller

{
    public function home(){
        $users = User::latest()->get();
        $wallet_balance = $users->sum('balance');
        $countdown = Setting::where('name', 'countdown')->first()->value;

        return view('admin.home', compact('users', 'wallet_balance', 'countdown'));
    }


    public function users()
    {
        $users = User::latest()->paginate(20);

        return view('admin.users', compact('users'));
    }


    public function settings()
    {
        $ref_payment =  Setting::where('name', 'ref_payment')->first()->value;
        $initial_balance =  Setting::where('name', 'initial_balance')->first()->value;
        $countdown =  Setting::where('name', 'countdown')->first()->value;

        return view('admin.settings', compact('ref_payment', 'initial_balance', 'countdown') );
    }


    public function updateSettings(Request $r)
    {
        $ref_payment =  Setting::where('name', 'ref_payment')->first();
        $initial_balance =  Setting::where('name', 'initial_balance')->first();

        $ref_payment->value = $r->ref_payment;
        $initial_balance->value = $r->initial_balance;

        $ref_payment->save();
        $initial_balance->save();

        return back()->with(['success' => 'Settings updated']);
    }


    public function updateCountdown(Request $r)
    {
        $countdown =  Setting::where('name', 'countdown')->first();
        $countdown->value = $r->countdown;
        $countdown->save();

        return back()->with(['success' => 'Countdown updated']);
    }



    public function withdrawals()
    {
        $withdrawals =  WalletTxn::where(['status' => 'pending', 'type' => 'debit'])->paginate(20);

        return view('admin.withdrawals', compact('withdrawals'));
    }

    public function confirmWithdraw(WalletTxn $txn)
    {
        if ($txn->status != 'pending' ) {
            return back()->with(['error' => 'Transaction not valid']);
        }

        $txn->status = 'success';
        $txn->save();

        return back()->with(['success' => 'Transaction completed']);
    }
}

