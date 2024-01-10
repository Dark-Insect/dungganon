<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class EmailTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        Mail::fake();

        Mail::to('kisseljamespaalam@gmail.com')->send(new TestEmail());

        Mail::assertSent(TestEmail::class, function ($mail) {
            return $mail->to[0]['address'] === 'kisseljamespaalam@gmail.com';
        });
    }
}
