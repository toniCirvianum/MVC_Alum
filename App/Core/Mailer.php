<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Mailer extends PHPMailer
{
    function mailServerSetup()
    {
        //Server settings
        $this->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $this->isSMTP(); //Send using SMTP
        $this->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $this->SMTPAuth = true; //Enable SMTP authentication
        $this->Username = 'toni.fernandez@cirvianum.cat'; //SMTP username
        $this->Password = 'sweppfvnfypqamaf'; //SMTP password
        $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $this->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    }

    function addRec($to, $cc = array(), $bcc = array())
    {
        $this->setFrom('phpmailer.toni.fernandez@cirvianum.cat', 'Toni');
        foreach ($to as $address) {
            $this->addAddress($address);
        }
        foreach ($cc as $address) {
            $this->addCC($address);
        }
        foreach ($bcc as $address) {
            $this->addBCC($address);
        }
    }

    function addAttachments($att)
    {
        foreach ($att as $attachment) {
            $this->addAttachment($attachment);
        }
    }

    function addVerifyContent($user = null)
    {
        $this->isHTML(true);
        $this->Subject = 'Verify your email please...';
        $content = "<p>Hi Toni </p>";
        $content .= "<p>Click follow button in order to verify your email</p>";
        $content .= "<a style='padding: 4px; background-color: red; color:white; text-decoration-color: unset;' href='http://localhost/user/verify/?username=" . $user['username'] . "&token=" . $user['token'] . "'>Verify!</a>";
        $this->Body = $content;

    }


}