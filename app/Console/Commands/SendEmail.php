<?php

namespace App\Console\Commands;

use App\Mail\NotifyMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;


class SendEmail extends Command
{
    // public $mail;
    // public function __construct(Mail $mail)
    // {
    //     parent::__construct();
    //     $this->mail = $mail;
    // }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email';

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
        // Set email details
        // $toEmail = 'kisseljamespaalam@gmail.com';
        // $subject = 'Email Subject';
        // $view = 'email.test'; // Path to email template
        // $data = ['data' => 'Some data to pass to the view'];

        // // Send email
        // $this->mail->send($view, $data, function ($message) use ($toEmail, $subject) {
        //     $message->to($toEmail)->subject($subject);
        // });

        // $this->info('Email sent successfully!');

        $result = Mail::to('jamesvillamilking123@gmail.coms')->send(new NotifyMail());
        
        // if($result){
        //     $this->info('Email sent successfully!');
        // }else{
        //     $this->info('Email sent failed!');
        // }
        // echo $result;
        // $this->info($result);
        if (Mail::flushMacros()) {
            $this->info('Email sent failed!');
            // Handle failed emails (e.g., log failures, retry, notify user)
        } else {
            $this->info('Email sent successfully!');
        }
    }
}
