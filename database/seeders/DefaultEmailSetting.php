<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultEmailSetting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('email_setting')->insert([
            [
                'mail_title' => 'Reminder',
                'mail_subject' => 'Reminder',
                'mail_schedule' => 'every_week'
            ]
        ]);
    }
}
