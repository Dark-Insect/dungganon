<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MemberController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $mails = DB::table('sent_mail')->where('user_id',$userId)->get();
        return view('layouts.member.index',compact('userId','mails'));
    }

    public function show($id)
    {
        DB::table('sent_mail')->where('id', $id)->update([
            'is_seen' => 1
        ]);

        $data  = DB::table('sent_mail')->where('id', $id)->first();

        $setting = DB::table('email_setting')->first();

        $carbonDate = Carbon::parse($data->date_received);
        $date = $carbonDate->format('F d, Y l');

        $userId = auth()->id();
        $user = DB::table('users')->where('id', $userId)->first();
        $parts = explode(', ', $user->name);
        $last = $parts[0];
        $first = $parts[1];
        
        return view('email.MemberEmailViewTemplate',compact('first','date','setting'));
    }
}
