<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoanPaymentController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users from the database

        return view('layouts.admin.loan-payments-index', compact('users')); // Pass users to the view
    }

    public function viewActiveLoan($user_id)
    {
        $loans = DB::table('loan_request')
        ->where('user_id', $user_id)
        ->get();

        return view('layouts.admin.loan-payments-user-loan-lists', compact('loans'));
    }

    public function viewLoan($loan_id)
    {
        $status = DB::table('loan_request')->where('loan_id', $loan_id)->first();
        if($status != "pending")
        {
            $loans = DB::table('account_history')->where('loan_id', $loan_id)->get();
            $user_id = $loans[0];

            $loan_id = $loan_id;

            return view('layouts.admin.loan-index',compact('loans','user_id','loan_id'));
        }
    }

    public function PayLoan(Request $reqeust, $loan_id)
    {
        $tellerID = auth()->id();

        $user_id = $reqeust['txt_user_id'];
        $amount  = $reqeust['txt-amount'];
        $interest = $reqeust['txt-interest'];

        // Get Balance
        $account = DB::table('account')->where('user_id', $user_id)->first();

        $balance = $account->account_balance - $amount;

        $balance = ($balance < 0) ? 0 : $balance;

        // DB::table('account_history')->insert([
        //     'user_id' => $user_id,
        //     'teller_id' => $tellerID,
        //     'loan_id' => $loan_id,
        //     'amount_pay' => $account,
        //     'balance' => $balance,
        //     'interest' => 0,
        //     'date' => now()->format('Y-m-d H:i:s')
        // ]);

        DB::table('account_history')->insert([
            'user_id' => $user_id,
            'teller_id' => $tellerID,
            'loan_id' => $loan_id,
            'balance' => $balance,
            'interest' => 0,
            'amount_pay' => $amount,
            'date' => now()->format('Y-m-d H:i:s')
        ]);

        // Update The Account
        DB::table('account')->where('user_id', $user_id)
        ->update([
            'account_balance' => $balance
        ]);

        session()->flash('sucess', 'Successfully updated the record!');

        // return route('admin.loan', $loan_id);
        // return redirect()->back();
        return redirect()->route('admin.loan', $loan_id);
    }
}
