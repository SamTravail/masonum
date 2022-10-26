<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET'])]
    public function index(
        ArticlesRepository $repository
    ): Response
    {
        return $this->render('pages/home.html.twig',[
            'articles' => $repository -> findPublicArticle(3)
        ]);
    }

    #[Route('/', name:'cours', methods: ['GET'])]
    public function cours(): Response
    {
        return $this->render('pages/feuilles_style/cours.html.twig');
    }
}