<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Email{
    public $email;
    public $nombre;
    public $token;
    public function __construct($email, $nombre, $token){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;        
    }

    public function enviarEmail(){
        // Creo el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525;
        $mail->Username = 'cd04119499fe2b';
        $mail->Password = '98278043998edc';

        $mail->setFrom('cuenta@burguer.com');
        $mail->addAddress('cuenta2@burguer.com','burguer.com');
        $mail->Subject = 'Por Favor confirme la cuenta';

        // Codigo Html
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola ".$this->nombre." Has creado tu cuenta en 
        el sistema, confirmala presionando el siguiente enlace </strong></p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/confirmar-cuenta?token="
        .$this->token."'>Confirma la cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste nada, ignora el mensaje</p>";
        $contenido .= "</html>";
        //Le paso el contenido al body
        $mail->Body = $contenido;
        $mail->send();
    }
}