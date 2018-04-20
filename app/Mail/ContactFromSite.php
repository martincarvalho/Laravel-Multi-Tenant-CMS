<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFromSite extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $subject;
    public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $subject = 'Contato do site', $body)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contact')
            ->subject($this->subject)
            ->from('atendimento@sample_site.com.br');
    }
}
