<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecyclageController extends AbstractController
{
    #[Route('/recyclage', name: 'app_recyclage')]
    public function index(): Response
    {
        return $this->render('recyclage/index.html.twig', [
            'controller_name' => 'RecyclageController',
        ]);
    }
}
