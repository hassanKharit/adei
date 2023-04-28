<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationsiteController extends AbstractController
{
    #[Route('/creationsite', name: 'app_creationsite')]
    public function index(): Response
    {
        return $this->render('creationsite/index.html.twig', [
            'controller_name' => 'CreationsiteController',
        ]);
    }
}
