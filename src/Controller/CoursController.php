<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Form\CoursType;
use App\Repository\CoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CoursController extends AbstractController
{
    #[Route('/cours', name: 'app_cours')]
    public function index(CoursRepository $repository, PaginatorInterface $paginator,
                          Request         $request): Response
    {
        $cours = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('pages/cours/index.html.twig', [
            'cours' => $cours,
        ]);
    }

    #[Route('/cours/nouveau', 'cours.new', methods: ['GET', 'POST'])]
    public function new(
        Request                $request,
        EntityManagerInterface $manager
    ): Response
    {
        $cours = new Cours();
        $form = $this->createForm(CoursType::class, $cours);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cours = $form->getData();

            $manager->persist($cours);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre cours a été crée'
            );

            return $this->redirectToRoute('cours.index');

        }

        return $this->render('pages/cours/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/cours/edition/{id}', 'cours.edit', methods: ['GET', 'POST'])]
    public function edit(
        Cours                  $cours,
        Request                $request,
        EntityManagerInterface $manager
    ): Response
    {
        $form = $this->createForm(CoursType::class, $cours);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cours = $form->getData();

            $manager->persist($cours);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre cours a modifié'
            );

            return $this->redirectToRoute('cours.index');

        }

        return $this->render('pages/cours/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/cours/suppression/{id}', 'cours.delete', methods: ['GET'])]
    public function delete(
        EntityManagerInterface $manager,
        Cours                  $cours
    ): Response
    {
        $manager->remove($cours);
        $manager->flush();

        $this->addFlash(
            'success',
            'Votre cours a supprimé'
        );

        return $this->redirectToRoute('cours.index');
    }
}
