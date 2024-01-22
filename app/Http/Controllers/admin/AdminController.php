<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

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
        $permanent_address = $data['txt_permanent_st'] . ", " . $data['txt_permanent_barangay'] . ", " . $data['txt_permanent_city'] . ", " . $data['txt_permanent_province'];
        $fullname = $data['txt_first_name'] . " " . $data['txt_last_name'];
        User::create([
            'first_name' => $data['txt_first_name'],
            'middle_name' => $data['txt_middle_name'],
            'last_name' => $data['txt_last_name'],
            'date_of_birth' => Carbon::parse($data['dtr_date_of_birth']),
            'place_of_birth' => $data['txt_place_of_birth'],
            'civil_status' => $data['civil_status'],
            'gender' => $data['gender'],
            'religion' => $data['religion'],
            'education_attainment' => $data['educational_attainment'],
            'profile_pic' => 'not_set',
            'present_address' => $data['txt_present_address'],
            'permanent_address' => $permanent_address,
            'no_of_years' => $data['txt_no_years'],
            'mother_first_name' => $data['txt_m_first_name'],
            'mother_middle_name' => $data['txt_m_middle_name'],
            'mother_last_name' => $data['txt_m_last_name'],
            'mother_other_information' => 'not_set',
            'hs_first_name' => $data['txt_hs_first_name'],
            'hs_middle_name' => $data['txt_hs_middle_name'],
            'hs_last_name' => $data['txt_hs_last_name'],
            'hs_extension' => $data['txt_hs_extention'],
            'hs_date_of_birth' => Carbon::parse($data['txt_hs_date_of_birth']),
            'client_source_income' => $data['txt_client_source_income'],
            'hs_source_income' => $data['hs_present_source_of_income'],
            'total_income' => $data['txt_total_family_income'],
            'total_ppi_score' => $data['txt_total_ppi_score'],
            'phone' => $data['txt_contact'],
            'email' => $data['txt_email'],
            'password' => Hash::make($data['txt_password']),
            'role' => 'member',
            'is_active' => 1
        ]);

        session()->flash('success', 'Successfully registered '. $fullname .' as a new member.');

        return view('layouts.admin.member-create');
    }

    public function show()
    {
        // return view('layouts.admin.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $address = explode(', ',$user->permanent_address);
        $street = $address[0];
        $barangay = $address[1];
        $city = $address[2];
        $province = $address[3];

        return view('layouts.admin.member-edit', compact('user','street','barangay','city','province'));
    }

    public function update(Request $data, $id)
    {
        $user = User::findOrFail($id);
        
        if($data['txt_password'] != $data['txt_cpassword'])
        {
            session()->flash('warning', "Password and Confirm Password do not match!");
            return redirect()->route('admin.member.edit', [$id]);
        }

        if($data['txt_password'] != "" && $data['txt_cpassword'] !="")
        {
            User::where('id', $id)->update([
                'password' => Hash::make($data['txt_password']),
            ]);
        }
        $permanent_address = $data['txt_permanent_st'] . ", " . $data['txt_permanent_barangay'] . ", " . $data['txt_permanent_city'] . ", " . $data['txt_permanent_province'];
        $hs_extension = ($data['txt_hs_extention'] != "") ? $data['txt_hs_extention'] : 'n/a';
        $fullname = $data['txt_first_name'] . " " . $data['txt_last_name'];

        User::where('id', $id)->update([
            'first_name' => $data['txt_first_name'],
            'middle_name' => $data['txt_middle_name'],
            'last_name' => $data['txt_last_name'],
            'date_of_birth' => Carbon::parse($data['dtr_date_of_birth']),
            'place_of_birth' => $data['txt_place_of_birth'],
            'civil_status' => $data['civil_status'],
            'gender' => $data['gender'],
            'religion' => $data['religion'],
            'education_attainment' => $data['educational_attainment'],
            'profile_pic' => 'not_set',
            'present_address' => $data['txt_present_address'],
            'permanent_address' => $permanent_address,
            'no_of_years' => $data['txt_no_years'],
            'mother_first_name' => $data['txt_m_first_name'],
            'mother_middle_name' => $data['txt_m_middle_name'],
            'mother_last_name' => $data['txt_m_last_name'],
            'mother_other_information' => 'not_set',
            'hs_first_name' => $data['txt_hs_first_name'],
            'hs_middle_name' => $data['txt_hs_middle_name'],
            'hs_last_name' => $data['txt_hs_last_name'],
            'hs_extension' => $hs_extension,
            'hs_date_of_birth' => Carbon::parse($data['txt_hs_date_of_birth']),
            'client_source_income' => $data['txt_client_source_income'],
            'hs_source_income' => $data['hs_present_source_of_income'],
            'total_income' => $data['txt_total_family_income'],
            'total_ppi_score' => $data['txt_total_ppi_score'],
            'phone' => $data['txt_contact'],
            'email' => $data['txt_email'],
        ]);
        

        session()->flash('success', 'User updated successfully!');
        return redirect()->route('admin.member.edit', [$id]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $firstName = $user->first_name;

        $user->delete();
        session()->flash('deleted', "User $firstName successfully deleted.");

        return redirect()->route('admin.member.index', compact('firstName'));
    }
}
