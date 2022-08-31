<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Form\ArticleType;
use App\Repository\ArticlesRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;


class ArticlesController extends AbstractController
{
    #[Route('/articles', name: 'app_articles')]
    public function index(
        ArticlesRepository $repository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $articles = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            5,

        );


        return $this->render('pages/articles/index.html.twig', [
            'articles' => $articles

        ]);
    }
    #[Route('/articles/nouveau', 'articles.new', methods:['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager) : Response
    {
        $article = new Articles();
        $form = $this->createForm( ArticleType::class , $article);

        $form -> handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $article = $form->getData();
            ;
            $manager->persist($article);
           
            $manager->flush();

            $this->addFlash(
                'danger',
                'C\'est bon gars !!! c\'est dans la boite !!!! '
            );
           return $this->redirectToRoute('app_articles');
        }
        return $this->render('pages/articles/new.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
