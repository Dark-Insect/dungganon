<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberReminderController extends Controller
{
    public function index()
    {
        $data = DB::table('email_setting')
        ->where('id', 1)
        ->first();

        return view('layouts.admin.memberReminderSettings', compact('data'));
    }

    public function setSetting(Request $data)
    {
        DB::table('email_setting') 
        ->where('id', 1) 
        ->update([
            'mail_title' => $data->txt_title, 
            'mail_subject' => $data->txt_subject,
            'mail_schedule' => $data->cbo_schedule
        ]);
        session()->flash('success', "Successfully configured the notification settings!");
        return redirect()->route('admin.notifications', compact('data'));
    }
}
