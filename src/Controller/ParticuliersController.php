<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParticuliersController extends AbstractController
{
    #[Route('/particuliers', name: 'app_particuliers')]
    public function index(): Response
    {
        return $this->render('particuliers/index.html.twig', [
            'controller_name' => 'ParticuliersController',
        ]);
    }
}
