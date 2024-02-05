<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ClientSavingsController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('layouts.admin.savings-index',compact('users'));
    }

    public function viewSaving($id)
    {
        $user = DB::table('users')->where('id',$id)->first();
        $account = DB::table('account')->where('user_id', $id)->first();

        return view('layouts.admin.savings-account',compact(''));
    }
}
