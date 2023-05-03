<?php

namespace App\Service;




use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;






class TemplateMailService {



   
    private $mailer;

    public function __construct(MailerInterface $mailerInterface)
    {

    
        $this->mailer = $mailerInterface;
    }

    public function sendMail($nom,$email_expediteur,$telephone,$message,$description,$service)
    {

        
        $email = (new TemplatedEmail())
        ->from($email_expediteur)
        ->to('h.kharit@adei-france.fr')
        //->cc('cc@example.com')
        //->bcc('bcc@example.com')
        //->replyTo('fabien@example.com')
        //->priority(Email::PRIORITY_HIGH)
        ->subject('email')
        ->text('Sending emails is fun again!')
        ->htmlTemplate('ticket/email.html.twig')
        ->context([
            'Email' => $email_expediteur,
             'Nom' => $nom,
            'Telephone' => $telephone,
            'Message' => $message,
            'Description' => $description,
            'Projet_pour_service' => $service

        ]);


    $this->mailer->send($email);


}
}