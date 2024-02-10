<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberNotifications as MemberEmailTemplate;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Exception;

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
        $setting = DB::table('email_setting')->first();

        $today = Carbon::now();
        $formattedDate = $today->format('F d, Y l');

        $users = DB::table('users')->where('role','member')->get();

        if ($users->isNotEmpty()) {
            foreach ($users as $user) {
                $email = $user->email;

                // $parts = explode(', ', $user->first_name);
                // $lastName = $parts[0];
                // $firstName = $parts[1];

                $loans = DB::table('loan_request')->where('user_id', $user->id)->get();
                $notify = false;
                foreach($loans as $loan)
                {
                    if($loan->loan_status != "Fully Paid")
                    {
                        $notify = true;
                        $this->info('Not Fully paid');
                    }
                }
                
                if($notify == true)
                {
                    try {
                        $result = Mail::to($email)->send(new MemberEmailTemplate([
                            'name' => $user->first_name . " " . $user->last_name,
                            'today' => $formattedDate,
                            'subject' => $setting->mail_subject,
                            'title' => $setting->mail_title
                        ]));
    
                        $this->info('Email sent successfully to ' . $user->first_name);
                    } catch (Exception $e) {
                        // Handle the exception
                        $this->info('Email failed sending for ' . $user->first_name);
                    }
    
                    DB::table('sent_mail')->insert([
                        'email_id' => 0,
                        'user_id' => $user->id,
                        'is_seen' => 0,
                        'date_sent' => $today,
                        'date_received' => $today
                    ]);
                }
            }
        }
    }
}
