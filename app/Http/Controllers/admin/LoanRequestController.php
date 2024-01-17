<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoanRequestController extends Controller
{
    public function index()
    {
        return view('layouts.admin.loan-request');
    }
}
