<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SauvegardedonneeController extends AbstractController
{
    #[Route('/sauvegardedonnee', name: 'app_sauvegardedonnee')]
    public function index(): Response
    {
        return $this->render('sauvegardedonnee/index.html.twig', [
            'controller_name' => 'SauvegardedonneeController',
        ]);
    }
}
