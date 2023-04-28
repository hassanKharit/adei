<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReseauxsecuriteController extends AbstractController
{
    #[Route('/reseauxsecurite', name: 'app_reseauxsecurite')]
    public function index(): Response
    {
        return $this->render('reseauxsecurite/index.html.twig', [
            'controller_name' => 'ReseauxsecuriteController',
        ]);
    }
}
