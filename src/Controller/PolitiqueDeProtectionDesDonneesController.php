<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PolitiqueDeProtectionDesDonneesController extends AbstractController
{
    #[Route('/politique/de/protection/des/donnees', name: 'app_politique_de_protection_des_donnees')]
    public function index(): Response
    {
        return $this->render('politique_de_protection_des_donnees/index.html.twig', [
            'controller_name' => 'PolitiqueDeProtectionDesDonneesController',
        ]);
    }
}
