<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConformiteController extends AbstractController
{
    #[Route('/conformite', name: 'app_conformite')]
    public function index(): Response
    {
        return $this->render('conformite/index.html.twig', [
            'controller_name' => 'ConformiteController',
        ]);
    }
}
