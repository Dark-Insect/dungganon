<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class SetupEverything extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Setup Admin User
        User::create([
            'first_name' => 'admin',
            'middle_name' => 'admin',
            'last_name' => 'admin',
            'date_of_birth' => Carbon::create(2024,01,01 ),
            'place_of_birth' => '',
            'civil_status' => '',
            'gender' => '',
            'religion' => '',
            'education_attainment' => '',
            'profile_pic' => '',
            'present_address' => '',
            'permanent_address' => '',
            'no_of_years' => '',
            'mother_first_name' => '',
            'mother_middle_name' => '',
            'mother_last_name' => '',
            'mother_other_information' => '',
            'hs_first_name' => '',
            'hs_middle_name' => '',
            'hs_last_name' => '',
            'hs_extension' => '',
            'hs_date_of_birth' => Carbon::create(2024,01,01 ),
            'client_source_income' => '',
            'hs_source_income' => '',
            'total_income' => '',
            'total_ppi_score' => '',
            'phone' => '+639670231066',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'is_active' => 0
        ]);

        // Setup Default Notifications
        DB::table('email_setting')->insert([
            [
                'mail_title' => 'Reminder',
                'mail_subject' => 'Reminder',
                'mail_schedule' => 'every_week'
            ]
        ]);

        // Setup Member
        // User::create([
        //     'first_name' => 'Paalaman, Kissel James',
        //     'phone' => '+639236123123',
        //     'email' => 'jamesvillamilking123@gmail.com',
        //     'password' => Hash::make('secret'),
        //     'role' => 'member',
        //     'is_active' => 1
        // ]);
    }
}
