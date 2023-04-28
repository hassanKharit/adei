<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssistancedistanceController extends AbstractController
{
    #[Route('/assistancedistance', name: 'app_assistancedistance')]
    public function index(): Response
    {
        return $this->render('assistancedistance/index.html.twig', [
            'controller_name' => 'AssistancedistanceController',
        ]);
    }
}
