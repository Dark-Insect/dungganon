<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanListController extends Controller
{
    public function index()
    {
        $loans = DB::table('loan_request')
        ->join('users', 'loan_request.user_id', '=', 'users.id')
        ->get();

        return view('layouts.admin.loan-lists',compact('loans'));
    }
}
