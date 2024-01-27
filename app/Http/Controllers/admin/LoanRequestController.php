<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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

        return view('layouts.admin.loan-request-review',compact('data'));
    }
}
