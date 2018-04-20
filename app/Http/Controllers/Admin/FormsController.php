<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Mail;

class FormsController extends Controller
{
    public function sendContactMail(Request $request, $siteurl)
    {
        $email = $request->input('email');
        $subject = $request->input('subject');
        $body = $request->input('message');

        Mail::to('atendimento@sample_site.com.br')->send(new \App\Mail\ContactFromSite($email, $subject, $body));
        return redirect('/contato')->with('status', 'Mensagem enviada com sucesso.');;
    }

    public function sendPecaOSeuMail(Request $request, $siteurl)
    {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');

        Mail::to('atendimento@sample_site.com.br')->send(new \App\Mail\PecaOSeu($name, $phone, $email));
        return redirect('/peca-o-seu')->with('status', 'Pedido enviado! Em breve entraremos em contato!');;
    }
}
