<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateDefaultAdminCreds extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create Admin
        User::create([
            'name' => 'admin',
            'phone' => '+639770231063',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'is_active' => 0
        ]);
    }
}
