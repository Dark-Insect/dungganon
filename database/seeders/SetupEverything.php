<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SetupEverything extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Setup Admin User
        User::create([
            'name' => 'admin',
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
        User::create([
            'name' => 'Paalaman, Kissel James',
            'phone' => '+639236123123',
            'email' => 'jamesvillamilking123@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'member',
            'is_active' => 1
        ]);
    }
}
