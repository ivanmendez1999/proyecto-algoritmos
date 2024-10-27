<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {

        if  (session("magicLogin")) {
            return redirect()->to("set-password")
                                ->with("message", "Please update your password");
        }
        
        return view("Home/index");
    }



    private function sendTestEmail()
    {
        $email = \Config\Services::email();

        $email->setTo("recipients@example.com");

        $email->setSubject("Test Email");
        
        $email->setMessage("Hola, bienvenido a <i>CodeIgniter</i>");

        if ($email->send()) {

            echo "Email enviado.";
        } else {

            echo "Email no enviado";   
        }

        
    }
}
