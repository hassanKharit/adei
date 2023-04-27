<?php

namespace App\Controller;

use App\Form\TicketType;
use App\Service\MailService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TicketController extends AbstractController
{
    #[Route('/ticket', name: 'app_ticket')]
    public function index(MailService $mailService, Request $request): Response
    {
        $form = $this->createForm(TicketType::class);						
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
 
          $data = $form->getData();
 
 
           $email_form=$data['votre_email'];
           $message_form=$data['votre_message'];
 
           $mailService->sendMail(
           $email_form,  $message_form);
                 
        return $this->renderForm('ticket/traitement.html.twig', 
     [
             ]);
          }
            return $this->renderForm('ticket/index.html.twig', [
        	'form'=> $form,
         ]);
       }
}
