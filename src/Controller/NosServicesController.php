<?php

namespace App\Controller;
use App\Form\TicketType;

use App\Entity\NosServices;
use App\Form\NosServicesType;
use App\Service\TemplateMailService;
use App\Repository\NosServicesRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/nos_services')]
class NosServicesController extends AbstractController
{
    #[Route('/', name: 'app_nos_services_index', methods: ['GET'])]
    public function index(NosServicesRepository $nosServicesRepository): Response
    {
        return $this->render('nos_services/index.html.twig', [
            'nos_services' => $nosServicesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_nos_services_new', methods: ['GET', 'POST'])]
    public function new(Request $request, NosServicesRepository $nosServicesRepository): Response
    {
        $nosService = new NosServices();
        $form = $this->createForm(NosServicesType::class, $nosService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nosServicesRepository->save($nosService, true);

            return $this->redirectToRoute('app_nos_services_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nos_services/new.html.twig', [
            'nos_service' => $nosService,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nos_services_show', methods: ['GET'])]
    public function show(NosServices $nosService): Response
    {
        return $this->render('nos_services/show.html.twig', [
            'nos_service' => $nosService,
        ]);
    }

    #[Route('/edit/{id}', name: 'app_nos_services_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NosServices $nosService, NosServicesRepository $nosServicesRepository): Response
    {
        $form = $this->createForm(NosServicesType::class, $nosService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nosServicesRepository->save($nosService, true);

            return $this->redirectToRoute('app_nos_services_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nos_services/edit.html.twig', [
            'nos_service' => $nosService,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nos_services_delete', methods: ['POST'])]
    public function delete(Request $request, NosServices $nosService, NosServicesRepository $nosServicesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nosService->getId(), $request->request->get('_token'))) {
            $nosServicesRepository->remove($nosService, true);
        }

        return $this->redirectToRoute('app_nos_services_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/ticket/{id}', name: 'app_ticket')]
    public function ticket(NosServices $nosService, NosServicesRepository $nosServicesRepository,Request $request, TemplateMailService $templateMailService): Response
    {
        $form = $this->createForm(TicketType::class);						
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
            if ($form->isSubmitted() && $form->isValid()) {
                $nosServicesRepository->save($nosService, true);
    
            
 
          $data = $form->getData();
          
          

          $nom=$data['Nom'];
          $email_expediteur=$data['Email'];
          $telephone=$data['Telephone'];
          $service=$data['Projet_pour_service'];
          $description=$data['Description'];
          $message=$data['Message'];

          $templateMailService->sendMail($nom,$email_expediteur,$telephone,$service,$description,$message);
   
       
   
   
           }
   
           return $this->render('ticket/index.html.twig', [
               'form' => $form->createView(),
               'nos_service' => $nosService,
           ]);
      
   }}
}
