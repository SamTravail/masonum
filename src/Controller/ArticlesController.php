<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Form\ArticleType;
use App\Repository\ArticlesRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\OrderBy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\HttpFoundation\Request;


class ArticlesController extends AbstractController
{
    // Designation de la routte
    #[Route('/articles', name: 'app_articles')]
    // Affichage de tous les article dans un pableau sur la page articles
    public function index(
        ArticlesRepository $repository,
        // permets la pagination
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $articles = $paginator->paginate(
            // récupère toutes les données de la bdd
            $repository->findAll(),
            // on les classe 5 par page
            $request->query->getInt('page', 1),
            5,


        );


        return $this->render('pages/articles/index.html.twig', [
            'articles' => $articles

        ]);
    }
    // route qui sera marqué dans la barre du navigateur
    #[Route('/articles/nouveau', 'articles.new', methods: ['GET', 'POST'])]
    // création d'un nouvel article et envoie en bdd
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $article = new Articles();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            dd($article);
            // persist = on met dans la boite
            $manager->persist($article);
            //    flush on envoie vers la bdd
            $manager->flush();
            // rajout d'une alerte pour dire que ca a fonctionné
            $this->addFlash(
                'danger',
                'C\'est bon gars !!! c\'est dans la boite !!!! '
            );
            return $this->redirectToRoute('app_articles');
        }
        return $this->render('pages/articles/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
    // création d'une fonction pour modifier un article
    // route qui sera marqué dans la barre du navigateur
    #[Route('/articles/edition/{id}', 'articles.edit', methods: ['GET', 'POST'])]
    // Pas la peine de chercher par l'id avec symfony car il le fait en automatique
    //  public function edit(ArticlesRepository $repository, int $id): Response
    public function edit(Articles $article, Request $request, EntityManagerInterface $manager): Response
    {
        // grâce a symfony pas la peine de chercher par l'id car comme l'article contient en bdd un id symfony le cherche automatiquement
        // $article = $repository->findOneBy(['id' => $id]);
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();;
            // persist = on met dans la boite
            $manager->persist($article);
            //    flush on envoie vers la bdd
            $manager->flush();
            // rajout d'une alerte pour dire que ca a fonctionné
            $this->addFlash(
                'danger',
                'Ca y est tu as corrigé tes conneries ? '
            );
            return $this->redirectToRoute('app_articles');
        }
        return $this->render('pages/articles/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    // Supprimer un article
    // route du navigateur
    #[route('/articles/suppression/{id}', 'articles.delete', methods: ['GET'])]
    public function delete( EntityManagerInterface $manager, Articles $article) : Response
    {
      $manager->remove($article) ;
      $manager->flush();
      $this->addFlash(
        'danger',
        'Hop poubelle ! Bon débarras!! '
    );
    
      return $this->redirectToRoute('app_articles');
    }
}
