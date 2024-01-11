<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateDefaultMemberUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Paalaman, Kissel James',
            'phone' => '+639236123123',
            'email' => 'jamesvillamilking123@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'member',
            'is_active' => 1
        ]);

        User::create([
            'name' => 'Clark, Charlie',
            'phone' => '+639236123123',
            'email' => 'jamesvillamilking123@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'member',
            'is_active' => 1
        ]);

        User::create([
            'name' => 'Brown, Gabriel',
            'phone' => '+639236123123',
            'email' => 'jamesvillamilking123@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'member',
            'is_active' => 1
        ]);

        User::create([
            'name' => 'Jackson, Eve',
            'phone' => '+639236123123',
            'email' => 'jamesvillamilking123@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'member',
            'is_active' => 1
        ]);

        User::create([
            'name' => 'Nelson, Charlie',
            'phone' => '+639236123123',
            'email' => 'jamesvillamilking123@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'member',
            'is_active' => 1
        ]);
    }
}
