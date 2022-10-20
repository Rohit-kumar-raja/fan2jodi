<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function transaction()
    {
        // $data =   DB::table('wallets')->where('status', 1)->where('id', Auth::user()->id)->get();
        $data =   DB::table('wallets')->where('status', 1)->get();

        return view('transaction', ['data' => $data]);
    }
}
