<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\LoanApproved as LoanApprovedNotifications;
use App\Mail\DeclineLoanNotifications as DeclineLoanNotification;
use Illuminate\Support\Facades\Mail;

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
            case 0.90:
                $term = "9 Months";
                break;
            case 1:
                $term = "12 Months";
                break;
        }
        

        return view('layouts.admin.loan-request-review',compact('data','term','id'));
    }

    public function LoanApproved($id)
    {
        // Select 
        $loan = DB::table('loan_request')->where('loan_id', $id)->first();

        $user = User::findOrFail($loan->user_id);

        $data = DB::table('loan_request')
        ->where('loan_id',$id)
        ->update([
            'loan_approved' => 'approved'
        ]);

        // Add Balance Account
        $account = DB::table('account')->where('user_id', $loan->user_id)->first();
        if (!is_null($account)) {
            $new = $account->account_balance + $loan->loan_amount;
            DB::table('account')->where('user_id', $loan->user_id)->update([
                'account_balance' => $new
            ]);
        } else {
            DB::table('account')->insert([
                'user_id' => $loan->user_id,
                'account_balance' => $loan->loan_amount
            ]);
        }
        // Add History
        DB::table('account_history')->insert([
            'user_id' => $loan->user_id,
            'teller_id' => auth()->id(),
            'loan_id' => $id,
            'balance' => $loan->loan_amount,
            'interest' => 0,
            'principal' => 0,
            'loan_amortization' => 0,
            'amount_pay' => 0,
            'date' => now()->format('Y-m-d H:i:s')
        ]);

        // Notify the user when approved
        $term = "";
        switch($loan->loan_term)
        {
            case 0.30:
                $term = "3 Months";
                break;
            case 0.60:
                $term = "6 Months";
                break;
            case 0.90:
                $term = "9 Months";
                break;
            case 1:
                $term = "12 Months";
                break;
        }

        $result = Mail::to($user->email)->send(new LoanApprovedNotifications([
            'name' => $user->first_name . " " . $user->last_name,
            'loan_amount' => $loan->loan_amount,
            'loan_purpose' => $loan->loan_purpose,
            'loan_term' => $term,
            'interest' => $loan->interest,
            'weekly' => $loan->loan_amortization,
        ]));

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

        $loan = DB::table('loan_request')->where('loan_id', $id)->first();
        $user = User::findOrFail($loan->user_id);

        $result = Mail::to($user->email)->send(new DeclineLoanNotification([
            'name' => $user->first_name . " " . $user->last_name,
            'loan_amount' => $loan->loan_amount,
            'loan_purpose' => $loan->loan_purpose
        ]));

        session()->flash('danger', 'User Successfully Declined');

        return redirect()->route('admin.loan-review', ['id' => $id]);
    }
}
