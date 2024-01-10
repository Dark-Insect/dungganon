<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class SendTestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-test-email';

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
        $recipientEmail = 'jamesvillamilking123@gmail.com'; // Update with your recipient email
        Mail::to($recipientEmail)->send(new TestEmail());

        $this->info('Test email sent successfully to ' . $recipientEmail);
    }
}
