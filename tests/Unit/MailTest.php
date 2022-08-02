<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Mail\CompanyEmails;
use Illuminate\Support\Facades\Mail;


class MailerTest extends TestCase
{
   /**
    * A basic unit test example.
    *
    * @return void
    */
   public function testSendEmail(){
       Mail::fake();
       Mail::send(new CompanyEmails());
       Mail::assertSent(CompanyEmails::class);
       Mail::assertSent(CompanyEmails::class, function ($mail) {
           $mail->build();
           $this->assertTrue($mail->hasFrom('admin@admin.com'));
           $this->assertTrue($mail->subject('New company created!'));
           return true;
       });
   }
}
