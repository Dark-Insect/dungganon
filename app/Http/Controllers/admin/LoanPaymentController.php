<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Mail\LoanFullyPaidNotifications as LoanFullyPaidNotify;
use Illuminate\Support\Facades\Mail;

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

        $d = DB::table('users')->where('id', $user_id)->first();

        return view('layouts.admin.loan-payments-user-loan-lists', compact('loans','d'));
    }

    public function viewLoan($loan_id)
    {
        $status = DB::table('loan_request')->where('loan_id', $loan_id)->first();
        if($status != "pending")
        {
            $loans = DB::table('account_history')->where('loan_id', $loan_id)->get();
            $loan = DB::table('loan_request')->where('loan_id', $loan_id)->first();
            $user_id = $loans[0];

            $loan_id = $loan_id;

            return view('layouts.admin.loan-index',compact('loans','user_id','loan_id','loan'));
        }
    }

    public function PayLoan(Request $reqeust, $loan_id)
    {
        $tellerID = auth()->id();

        $loan = DB::table('loan_request')->where('loan_id', $loan_id)->first();

        $user_id = $reqeust['txt_user_id'];
        $amount  = $reqeust['txt-amount'];
        $account = DB::table('account')->where('user_id', $user_id)->first();

        $history = DB::table('account_history')->where('loan_id', $loan_id)->orderBy('history_id', 'desc')->first();

        if($amount >= $loan->loan_amortization)
        {
            // Check Balance
            if($history->balance <= 0)
            {
                session()->flash('success', 'User already fully paid!');
                DB::table('loan_request')->where('loan_id', $loan_id)->update([
                    'loan_status' => "Fully Paid"
                ]);

                // Here goes the Notification
                $user = User::findOrFail($user_id);
                $result = Mail::to($user->email)->send(new LoanFullyPaidNotify([
                    'name' => $user->first_name . " " . $user->last_name,
                    'loan_amount' => $loan->loan_amount,
                    'loan_purpose' => $loan->loan_purpose,
                ]));
            }else{
                // Get Balance
                $balance = $history->balance - $loan->principal;

                $balance = ($balance < 0) ? 0 : $balance;

                DB::table('account_history')->insert([
                    'user_id' => $user_id,
                    'teller_id' => $tellerID,
                    'loan_id' => $loan_id,
                    'balance' => $balance,
                    'interest' => $loan->interest,
                    'principal' => $loan->principal,
                    'loan_amortization' => $loan->loan_amortization,
                    'amount_pay' => $amount,
                    'date' => now()->format('Y-m-d H:i:s')
                ]);

                // Update The Account
                DB::table('account')->where('user_id', $user_id)
                ->update([
                    'account_balance' => $balance
                ]);

                session()->flash('success', 'Successfully updated the record!');

                // Check If Fully Paid

                if($balance <= 0)
                {
                    session()->flash('success', 'User is fully paid!');
                    DB::table('loan_request')->where('loan_id', $loan_id)->update([
                        'loan_status' => "Fully Paid"
                    ]);
                    // Here goes the Notification
                    $user = User::findOrFail($user_id);
                    $result = Mail::to($user->email)->send(new LoanFullyPaidNotify([
                        'name' => $user->first_name . " " . $user->last_name,
                        'loan_amount' => $loan->loan_amount,
                        'loan_purpose' => $loan->loan_purpose,
                    ]));
                }
            }
        }else{
            session()->flash('failed', 'Amount inputted does not meet the Loan Amortization, which is ₱'.$loan->loan_amortization);
        }
        return redirect()->route('admin.loan', $loan_id);
    }
}
