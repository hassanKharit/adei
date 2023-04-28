<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepannageinfoController extends AbstractController
{
    #[Route('/depannageinfo', name: 'app_depannageinfo')]
    public function index(): Response
    {
        return $this->render('depannageinfo/index.html.twig', [
            'controller_name' => 'DepannageinfoController',
        ]);
    }
}
