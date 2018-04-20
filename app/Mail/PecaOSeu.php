<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PecaOSeu extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $name;
    public $phone;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $email, $subject = 'Pedido de cartão pelo site')
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.sample_site.peca-o-seu')
            ->subject($this->subject)
            ->from('atendimento@sample_site.com.br');
    }
}
