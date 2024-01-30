<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoanRequestController extends Controller
{
    public function index()
    {
        $loans = DB::table('loan_request')
        ->join('users', 'loan_request.user_id', '=', 'users.id')
        ->get();

        return view('layouts.admin.loan-request',compact('loans'));
    }

    public function ReviewLoanRequest($id)
    {
        $data = DB::table('loan_request')
        ->join('users', 'loan_request.user_id', '=', 'users.id')
        ->where('loan_id', $id)
        ->first();

        $loan_term = $data->loan_term;
        $term = "";
        switch($loan_term)
        {
            case 0.30:
                $term = "3 Months";
                break;
            case 0.60:
                $term = "6 Months";
                break;
            case 1:
                $term = "1 Years";
                break;
            case 2:
                $term = "2 Years";
                break;
            case 3:
                $term = "3 Years";
                break;
            case 4:
                $term = "4 Years";
                break;
            case 5:
                $term = "5 Years";
                break;
            case 6:
                $term = "6 Years";
                break;
            case 7:
                $term = "7 Years";
                break;
            case 8:
                $term = "8 Years";
                break;
            case 9:
                $term = "9 Years";
                break;
            case 10:
                $term = "10 Years";
                break;
        }
        

        return view('layouts.admin.loan-request-review',compact('data','term','id'));
    }

    public function LoanApproved($id)
    {
        // Select 
        $loan = DB::table('loan_request')->where('loan_id', $id)->first();

        $data = DB::table('loan_request')
        ->where('loan_id',$id)
        ->update([
            'loan_approved' => 'approved'
        ]);

        // Add Balance Account
        DB::table('account')->insert([
            'user_id' => $loan->user_id,
            'account_balance' => $loan->loan_amount
        ]);

        // Add History
        DB::table('account_history')->insert([
            'user_id' => $loan->user_id,
            'teller_id' => auth()->id(),
            'loan_id' => $id,
            'balance' => $loan->loan_amount,
            'interest' => 0,
            'amount_pay' => 0,
            'date' => now()->format('Y-m-d H:i:s')
        ]);

        session()->flash('success', 'User Successfully Approved');

        return redirect()->route('admin.loan-review', ['id' => $id]);
    }

    public function LoanDeclined($id)
    {
        $data = DB::table('loan_request')
        ->where('loan_id',$id)
        ->update([
            'loan_approved' => 'declined'
        ]);

        session()->flash('danger', 'User Successfully Declined');

        return redirect()->route('admin.loan-review', ['id' => $id]);
    }
}
