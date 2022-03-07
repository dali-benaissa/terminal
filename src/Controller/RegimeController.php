<?php

namespace App\Controller;

use App\Entity\Regime;
use App\Form\RegimeType;
use App\Repository\RegimeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * @Route("/regime")
 */
class RegimeController extends AbstractController
{
    /**
     * @Route("/", name="regime_index", methods={"GET"})
     */
    public function index(RegimeRepository $regimeRepository,Security  $token): Response
    {
        return $this->render('regime/index.html.twig', [
             'regimes' => $regimeRepository->findBy(array('user' => $token->getUser() )),
           // 'regimes' => $regimeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="regime_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager,Security  $token): Response
    {
        $regime = new Regime();
        $form = $this->createForm(RegimeType::class, $regime);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $regime->setUser($token->getUser());
            $entityManager->persist($regime);
            $entityManager->flush();

            return $this->redirectToRoute('regime_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('regime/new.html.twig', [
            'regime' => $regime,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="regime_show", methods={"GET"})
     */
    public function show(Regime $regime): Response
    {
        return $this->render('regime/show.html.twig', [
            'regime' => $regime,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="regime_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Regime $regime, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RegimeType::class, $regime);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('regime_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('regime/edit.html.twig', [
            'regime' => $regime,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="regime_delete", methods={"POST"})
     */
    public function delete(Request $request, Regime $regime, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$regime->getId(), $request->request->get('_token'))) {
            $entityManager->remove($regime);
            $entityManager->flush();
        }

        return $this->redirectToRoute('regime_index', [], Response::HTTP_SEE_OTHER);
    }
}
