<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        return view('layouts.member.loan-index');
    }

    public function create()
    {
        return view('layouts.member.loan-create');
    }
}
