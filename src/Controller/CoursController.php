<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoursController extends AbstractController
{
    #[Route('/', 'pages/feuilles_style/cours.index', methods: ['GET'])]
    public function index(): Response 
    {
        return $this->render('pages/feuilles_style/cours.html.twig');
    }
}