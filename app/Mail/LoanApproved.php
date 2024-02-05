<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LoanApproved extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $loan_amount;
    public $loan_purpose;
    public $loan_term;
    public $interest;
    public $weekly;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->loan_amount = $data['loan_amount'];
        $this->loan_purpose = $data['loan_purpose'];
        $this->loan_term = $data['loan_term'];
        $this->interest = $data['interest'];
        $this->weekly = $data['weekly'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Loan Approved',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.LoanApprovedEmailTemplate',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
