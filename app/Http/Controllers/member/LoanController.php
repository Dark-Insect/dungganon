<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $datas = DB::table('loan_request')
        ->where('user_id', $userId)
        ->get();

        return view('layouts.member.loan-index',compact('datas'));
    }

    public function create()
    {
        return view('layouts.member.loan-create');
    }

    public function LoanRequest(Request $request)
    {
        $file = $request->file('formFile');

        if ($file->isValid()) {
            $uuid = Str::uuid()->toString();
            $extension = $file->getClientOriginalExtension();
            $uniqueFilename = $uuid . '.' . $extension;
            $path = $file->storeAs('uploads', $uniqueFilename, 'public');

            DB::table('loan_request')->insert([
                'loan_amount' => $request['txt_loan_amount'],
                'loan_purpose' => $request['txt_purpose'],
                'loan_weekly_earn' => $request['txt_weekly_earnings'],
                'loan_term' => $request['dtr_term'],
                'loan_approved' => 'pending',
                'user_id' => Auth::id(),
                'loan_uploaded_name' => $uniqueFilename,
                'loan_request_date' => now()->format('Y-m-d H:i:s'),
            ]);
            session()->flash('success', "Your loan application has been submitted! We typically take 3-5 business days to review all applications thoroughly. We'll let you know the outcome as soon as possible.");
            return view('layouts.member.loan-index');
        } else {
            session()->flash('danger', 'We encountered an issue processing your loan application. Please carefully review all fields and ensure they are filled out accurately before resubmitting.');
            return view('layouts.member.loan-create');
        }
    }
}
