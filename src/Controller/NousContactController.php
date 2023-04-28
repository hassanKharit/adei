<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NousContactController extends AbstractController
{
    #[Route('/nous/contact', name: 'app_nous_contact')]
    public function index(): Response
    {
        return $this->render('nous_contact/index.html.twig', [
            'controller_name' => 'NousContactController',
        ]);
    }
}
