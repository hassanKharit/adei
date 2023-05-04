<?php

namespace App\Controller;

use App\Form\TicketType;
use App\Service\TemplateMailService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AssistancedistanceController extends AbstractController
{
    #[Route('/assistancedistance', name: 'app_assistancedistance')]
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


        };

        return $this->render('assistancedistance/index.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}
