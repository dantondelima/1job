<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($link, $name)
    {
        $this->link = $link;
        $this->name = $name;
    }

    public function build()
    {
        $dados['link'] = $this->link;
        $dados['name'] = $this->name;
        return $this->from('dantondelima.contato@gmail.com', '1 Job')
        ->view("admin.auth.reset-admin")
        ->subject("Recuperação de senha")
        ->with("dados", $dados);
    }
}
