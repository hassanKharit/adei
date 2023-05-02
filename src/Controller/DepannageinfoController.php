<?php

namespace App\Controller;

use App\Form\TicketType;
use App\Service\TemplateMailService;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DepannageinfoController extends AbstractController
{
    #[Route('/depannageinfo', name: 'app_depannageinfo')]
    public function index(Request $request,TemplateMailService $templateMailService): Response
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

          $templateMailService->sendMail($nom,$email_expediteur,$telephone,$service,$description,$message);
   
       $mailer->send($email);
   
   
           }
   
           return $this->render('depannageinfo/index.html.twig', [
               'form' => $form->createView(),
           ]);
      
   }
}