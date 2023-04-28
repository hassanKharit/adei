<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecuperationdonneeController extends AbstractController
{
    #[Route('/recuperationdonnee', name: 'app_recuperationdonnee')]
    public function index(): Response
    {
        return $this->render('recuperationdonnee/index.html.twig', [
            'controller_name' => 'RecuperationdonneeController',
        ]);
    }
}
