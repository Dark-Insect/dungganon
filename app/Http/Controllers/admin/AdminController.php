<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users from the database

        return view('layouts.admin.index', compact('users')); // Pass users to the view
    }

    public function create()
    {
        return view('layouts.admin.member-create');
    }

    public function store(Request $data)
    {
        $fullname = $data['txt-fname'] . " " .$data['txt-lname'];
        $full = $data['txt-lname'] . ', ' . $data['txt-fname'];
        // Perform Validation
        $this->validate($data, [
            'txt-fname' => 'required|string|max:255',
            'txt-lname' => 'required|string|max:255',
            'txt-email' => 'required|string|email',
            'txt-phone' => 'required',
            'txt-pass' => 'required|string|min:8',
            'txt-cpass' => 'required|string|same:txt-pass'
        ]);

        $data = User::create([
            'name' => $full,
            'email' => $data['txt-email'],
            'phone' => $data['txt-phone'],
            'password' => Hash::make($data['txt-cpass']),
            'role' => 'member'
        ]);

        session()->flash('success', 'Successfully registered '.$fullname.' as a new member.');

        return view('layouts.admin.member-create');
    }

    public function show()
    {
        // return view('layouts.admin.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $parts = explode(', ', $user->name);
        $lastName = $parts[0];
        $firstName = $parts[1];
        return view('layouts.admin.member-edit', compact('user', 'lastName', 'firstName'));
    }

    public function update(Request $data, $id)
    {
        $user = User::findOrFail($id);
        
        if($data['txt-pass'] != $data['txt-cpass'])
        {
            session()->flash('warning', "Password and Confirm Password do not match!");
            return redirect()->route('admin.member.edit', [$id]);
        }

        if($data['txt-pass'] != "" && $data['txt-cpass'] !="")
        {
            User::where('id', $id)->update([
                'name' => $data['txt-lname'] . ", " . $data['txt-fname'],
                'email' => $data['txt-email'],
                'phone' => $data['txt-phone']
            ]);
        }else{
            User::where('id', $id)->update([
                'name' => $data['txt-lname'] . ", " . $data['txt-fname'],
                'email' => $data['txt-email'],
                'phone' => $data['txt-phone'],
                'password' => Hash::make($data['txt-cpass']),
            ]);
        }
        

        session()->flash('success', 'User updated successfully!');
        return redirect()->route('admin.member.edit', [$id]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $parts = explode(', ', $user->name);
        $lastName = $parts[0];
        $firstName = $parts[1];

        $user->delete();
        session()->flash('deleted', "User $firstName successfully deleted.");

        return redirect()->route('admin.member.index', compact('firstName'));
    }
}
