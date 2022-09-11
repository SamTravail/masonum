<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecutityController extends AbstractController
{
    #[Route('/connexion', name: 'app_login', methods: ['GET', 'POST'])]
    public function login(): Response
    {
        return $this->render('pages/secutity/login.html.twig', [
            'controller_name' => 'SecutityController',
        ]);
    }
    #[Route('/deconnexion', name: 'app_logout')]
    public function logout()
    {
        // ne rien mettre ici ca se fait tout seul
    }
}
