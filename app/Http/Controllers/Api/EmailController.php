<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail; 

class EmailController extends Controller
{
    public function email(Request $req){
        // Configuration
        $smtpAddress = 'smtp.gmail.com';
        $port = 465;
        $encryption = 'ssl';
        $yourEmail = 'rdmarketemail@gmail.com';
        $yourPassword = 'nossaSenhaeh1234';

        // Prepare transport
        $transport = (new \Swift_SmtpTransport($smtpAddress, $port, $encryption))
                ->setUsername($yourEmail)
                ->setPassword($yourPassword);
        $mailer = new \Swift_Mailer($transport);

        $corpo = $req->nome." mandou uma mensagem, e espera uma resposta em: ".$req->email."\nMensagem: ".$req->mensagem;

        
        // Send email
        $message = (new \Swift_Message('Test'))
            ->setSubject($req->assunto)
             ->setFrom('rdmarketemail@gmail.com')
             ->setTo("rdmarketemail@gmail.com")
             // If you want plain text instead, remove the second paramter of setBody
             ->setBody($corpo);
             
        if($mailer->send($message)){
            return response()->json("Email enviado com sucesso",200);
        }

        return response()->json("Ocorreu algum erro",204);
    }
}
