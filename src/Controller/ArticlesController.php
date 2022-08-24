<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    #[Route('/articles', name: 'app_articles')]
    public function index(ArticlesRepository $repository): Response
    {
        $articles = $repository->findAll();
        
        return $this->render('pages/articles/index.html.twig', [
           'articles'=>$articles 
        ]);
    }
}
