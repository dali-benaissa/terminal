<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UserType;
use App\Entity\User;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Route("/admin", name="admin_")
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    /**
     * @Route("/settings", name="profile_settings")
     */
    public function settings(Request $request): Response
    {
        $form = $this->createForm(UserType::class, $this->getUser());

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('profile_settings');
        }

        return $this->render('dashboard/profilesettings.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/deleteAccount", name="profile_delete")
     */
    public function delete_profile(): Response
    {   
        $user = $this->getDoctrine()->getManager()->getRepository(User::class)->find($this->getUser()->getId());
        
        $session = $this->get('session');
        $session = new Session();
        $session->invalidate();
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_register');

        // $test = new Response($user->getId(), 200);
        // return $test;
    }
}
