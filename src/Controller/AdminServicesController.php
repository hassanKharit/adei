<?php

namespace App\Controller;

use App\Entity\Services;
use App\Form\ServicesType;
use App\Repository\ServicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/services')]
class AdminServicesController extends AbstractController
{
    #[Route('/', name: 'app_admin_services_index', methods: ['GET'])]
    public function index(ServicesRepository $servicesRepository): Response
    {
        return $this->render('admin_services/index.html.twig', [
            'services' => $servicesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_services_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ServicesRepository $servicesRepository): Response
    {
        $service = new Services();
        $form = $this->createForm(ServicesType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $servicesRepository->save($service, true);

            return $this->redirectToRoute('app_admin_services_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_services/new.html.twig', [
            'service' => $service,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_services_show', methods: ['GET'])]
    public function show(Services $service): Response
    {
        return $this->render('admin_services/show.html.twig', [
            'service' => $service,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_services_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Services $service, ServicesRepository $servicesRepository): Response
    {
        $form = $this->createForm(ServicesType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $servicesRepository->save($service, true);

            return $this->redirectToRoute('app_admin_services_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_services/edit.html.twig', [
            'service' => $service,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_services_delete', methods: ['POST'])]
    public function delete(Request $request, Services $service, ServicesRepository $servicesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$service->getId(), $request->request->get('_token'))) {
            $servicesRepository->remove($service, true);
        }

        return $this->redirectToRoute('app_admin_services_index', [], Response::HTTP_SEE_OTHER);
    }
}
