<?php

namespace App\Controller;

use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class SecutityController extends AbstractController
{
    #[Route('/connexion', name: 'app_login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('pages/secutity/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError()
        ]);
    }

    #[Route('/deconnexion', name: 'app_logout')]
    public function logout()
    {
        // ne rien mettre ici ca se fait tout seul
    }
    #[Route('/inscription', name: 'app_registration', methods: ['GET', 'POST'])]
    public function registration(Request $request , EntityManagerInterface $manager): Response
    {
        $user = new User();
        $user->setRoles(['ROLE_USER']);
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);
        // dd($form->getData());
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();

            $this->addFlash(
                'sucess',
                'Bienvenue ma poule !'
            );
            $manager ->persist($user);

            $manager->flush();
            return $this->redirectToRoute('app_login');
        }
        return $this->render('pages/secutity/registration.html.twig', [
            'form'=> $form->createView()
        ]);
    }
}
