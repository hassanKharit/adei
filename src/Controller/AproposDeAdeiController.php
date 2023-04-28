<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AproposDeAdeiController extends AbstractController
{
    #[Route('/apropos/de/adei', name: 'app_apropos_de_adei')]
    public function index(): Response
    {
        return $this->render('apropos_de_adei/index.html.twig', [
            'controller_name' => 'AproposDeAdeiController',
        ]);
    }
}
