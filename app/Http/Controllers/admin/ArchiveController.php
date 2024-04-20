<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ArchiveController extends Controller
{
    public function archive()
{   
    $users = User::all(); 
    return view('layouts.admin.archive',compact('users'));
}

}
