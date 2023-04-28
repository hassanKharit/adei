<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InstallationController extends AbstractController
{
    #[Route('/installation', name: 'app_installation')]
    public function index(): Response
    {
        return $this->render('installation/index.html.twig', [
            'controller_name' => 'InstallationController',
        ]);
    }
}
