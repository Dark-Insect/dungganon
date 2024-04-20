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

        // //setup User Account
        // User::create([
        //     'first_name' => 'user',
        //     'middle_name' => 'user',
        //     'last_name' => 'user',
        //     'date_of_birth' => Carbon::create(2024,01,01 ),
        //     'place_of_birth' => '',
        //     'civil_status' => '',
        //     'gender' => '',
        //     'religion' => '',
        //     'education_attainment' => '',
        //     'profile_pic' => '',
        //     'present_address' => '',
        //     'permanent_address' => '',
        //     'no_of_years' => '',
        //     'mother_first_name' => '',
        //     'mother_middle_name' => '',
        //     'mother_last_name' => '',
        //     'mother_other_information' => '',
        //     'hs_first_name' => '',
        //     'hs_middle_name' => '',
        //     'hs_last_name' => '',
        //     'hs_extension' => '',
        //     'hs_date_of_birth' => Carbon::create(2024,01,01 ),
        //     'client_source_income' => '',
        //     'hs_source_income' => '',
        //     'total_income' => '',
        //     'total_ppi_score' => '',
        //     'phone' => '+639670231066',
        //     'email' => 'user@user.com',
        //     'password' => Hash::make('user'),
        //     'role' => 'member',
        //     'is_active' => 0
        // ]);

//         $faker = \Faker\Factory::create();

// for ($i = 0; $i < 10; $i++) {
//     User::create([
//         'first_name' => $faker->firstName,
//         'middle_name' => $faker->firstName,
//         'last_name' => $faker->lastName,
//         'date_of_birth' => $faker->dateTimeBetween('-80 years', '-18 years'),
//         'place_of_birth' => $faker->city,
//         'civil_status' => $faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
//         'gender' => $faker->randomElement(['Male', 'Female']),
//         'religion' => $faker->randomElement(['Christianity', 'Islam', 'Hinduism', 'Buddhism', 'Others']),
//         'education_attainment' => $faker->randomElement(['High School', 'College', 'Bachelor\'s Degree', 'Master\'s Degree', 'PhD']),
//         'profile_pic' => $faker->imageUrl(),
//         'present_address' => $faker->address,
//         'permanent_address' => $faker->address,
//         'no_of_years' => $faker->numberBetween(1, 50),
//         'mother_first_name' => $faker->firstNameFemale,
//         'mother_middle_name' => $faker->firstNameFemale,
//         'mother_last_name' => $faker->lastName,
//         'mother_other_information' => $faker->sentence,
//         'hs_first_name' => $faker->firstName,
//         'hs_middle_name' => $faker->firstName,
//         'hs_last_name' => $faker->lastName,
//         'hs_extension' => $faker->randomElement(['Sr.', 'Jr.', 'II', 'III']),
//         'hs_date_of_birth' => $faker->dateTimeBetween('-25 years', '-18 years'),
//         'client_source_income' => $faker->sentence,
//         'hs_source_income' => $faker->sentence,
//         'total_income' => $faker->numberBetween(10000, 1000000),
//         'total_ppi_score' => $faker->numberBetween(0, 100),
//         'phone' => $faker->phoneNumber,
//         'email' => $faker->unique()->safeEmail,
//         'password' => Hash::make($faker->password),
//         'role' => 'member',
//         'is_active' => '1'// 100% probability of being active
//     ]);
// }




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
