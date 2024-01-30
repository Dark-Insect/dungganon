<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoanBalanceController extends Controller
{
    public function index()
    {
        $userID = auth()->id();

        $balances = DB::table('account_history')
        ->where('user_id', $userID)
        ->get();

        return view('layouts.member.loan-balance',compact('balances'));
    }
}
