<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RechercheController extends AbstractController
{
    #[Route('/recherche', name: 'app_recherche')]
    public function rechercher(Request $request): Response
    {
        $termeRecherche = $request->query->get('q');


        return $this->redirectToRoute('app_recherche', ['q' => $termeRecherche]);
        
       
    }
}




 // return $this->render('recherche/index.html.twig', [
            // 'rechercher' => 'resultats'
        // ]);
