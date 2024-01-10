<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberNotifications as MemberEmailTemplate;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MemberNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:member-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now();
        $formattedDate = $today->format('F d, Y l');

        $users = DB::table('users')->where('role','member')->get();

        if ($users->isNotEmpty()) {
            foreach ($users as $user) {
                $email = $user->email;

                $parts = explode(', ', $user->name);
                $lastName = $parts[0];
                $firstName = $parts[1];
                
                $result = Mail::to($email)->send(new MemberEmailTemplate([
                    'name' => $firstName . " " . $lastName,
                    'today' => $formattedDate,
                ]));

                $this->info('Email sent successfully to ' . $firstName);
            }
        }
    }
}
