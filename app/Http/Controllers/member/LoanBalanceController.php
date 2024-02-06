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

        // $balances = DB::table('account_history')
        // ->where('user_id', $userID)
        // ->get();

        $loans = DB::table('loan_request')->where('user_id', $userID)->get();

        $balances = [];
        foreach($loans as $loan)
        {
            $left = DB::table('account_history')->where('loan_id', $loan->loan_id)->orderBy('history_id', 'desc')->first();

            if(is_null($left))
            {
                array_push($balances, "Pending for Approval");
            }else{
                array_push($balances, $left->balance);
            }
        }
        return view('layouts.member.loan-balance',compact('loans','balances'));
    }
}
