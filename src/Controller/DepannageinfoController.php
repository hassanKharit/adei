<?php

namespace App\Controller;

use App\Form\TicketType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DepannageinfoController extends AbstractController
{
    #[Route('/depannageinfo', name: 'app_depannageinfo')]
    public function index(MailerInterface $mailer, Request $request): Response
    {
        $form = $this->createForm(TicketType::class);						
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
 
          $data = $form->getData();
 
           $nom=$data['Nom'];
           $email_expediteur=$data['Email'];
           $telephone=$data['Telephone'];
           $service=$data['Projet_pour_service'];
           $description=$data['Description'];
           $message=$data['Message'];
          
 
           $email = (new TemplatedEmail())
           ->from($email_expediteur)
           ->to('h.kharit@adei-france.fr')
           //->cc('cc@example.com')
           //->bcc('bcc@example.com')
           //->replyTo('fabien@example.com')
           //->priority(Email::PRIORITY_HIGH)
           ->subject('email')
           ->text('Sending emails is fun again!')
           ->htmlTemplate('depannageinfo/email.html.twig')
           ->context([
               'Email' => $email_expediteur,
                'Nom' => $nom,
               'Telephone' => $telephone,
               'Message' => $message,
               'Description' => $description,
               'Projet_pour_service' => $service

           ]);
   
       $mailer->send($email);
   
   
           }
   
           return $this->render('depannageinfo/index.html.twig', [
               'form' => $form->createView(),
           ]);
      
   }
}