<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class CompanyEmails extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->view('view.name');
    // }

    public function build(Request $request){
        return $this->from('admin@admin.com')
                    ->to($request->email)
                    ->subject('New company created!')
                    ->markdown('mails.email_notification')
                    ->with([
                        'name' => $request->name,
                        'link' => '/inboxes/'
                    ]);
    }
}
