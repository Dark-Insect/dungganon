<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanTypeListController extends Controller
{
    public function general()
    {
        $loans = DB::table('loan_request')
        ->join('users', 'loan_request.user_id', '=', 'users.id')
        ->where('loan_purpose','General')
        ->get();

        return view('layouts.admin.loan-lists-general',compact('loans'));
    }

    public function housing()
    {
        $loans = DB::table('loan_request')
        ->join('users', 'loan_request.user_id', '=', 'users.id')
        ->where('loan_purpose','Housing')
        ->get();

        return view('layouts.admin.loan-lists-housing',compact('loans'));
    }

    public function comfort()
    {
        $loans = DB::table('loan_request')
        ->join('users', 'loan_request.user_id', '=', 'users.id')
        ->where('loan_purpose','Comfort Room')
        ->get();

        return view('layouts.admin.loan-lists-comfort',compact('loans'));
    }

    public function educational()
    {
        $loans = DB::table('loan_request')
        ->join('users', 'loan_request.user_id', '=', 'users.id')
        ->where('loan_purpose','Educational')
        ->get();

        return view('layouts.admin.loan-lists-educational',compact('loans'));
    }
}
