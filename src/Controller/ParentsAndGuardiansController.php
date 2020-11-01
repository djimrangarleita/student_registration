<?php

namespace App\Controller;

use App\Entity\ParentsAndGuardians;
use App\Form\ParentsAndGuardiansType;
use App\Repository\ParentsAndGuardiansRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/parents/and/guardians")
 * @isGranted("ROLE_ADMIN")
 */
class ParentsAndGuardiansController extends AbstractController
{
    /**
     * @Route("/", name="parents_and_guardians_index", methods={"GET"})
     */
    public function index(ParentsAndGuardiansRepository $parentsAndGuardiansRepository): Response
    {
        return $this->render('parents_and_guardians/index.html.twig', [
            'parents_and_guardians' => $parentsAndGuardiansRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="parents_and_guardians_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $parentsAndGuardian = new ParentsAndGuardians();
        $form = $this->createForm(ParentsAndGuardiansType::class, $parentsAndGuardian);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($parentsAndGuardian);
            $entityManager->flush();

            return $this->redirectToRoute('parents_and_guardians_index');
        }

        return $this->render('parents_and_guardians/new.html.twig', [
            'parents_and_guardian' => $parentsAndGuardian,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parents_and_guardians_show", methods={"GET"})
     */
    public function show(ParentsAndGuardians $parentsAndGuardian): Response
    {
        return $this->render('parents_and_guardians/show.html.twig', [
            'parents_and_guardian' => $parentsAndGuardian,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="parents_and_guardians_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ParentsAndGuardians $parentsAndGuardian): Response
    {
        $form = $this->createForm(ParentsAndGuardiansType::class, $parentsAndGuardian);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parents_and_guardians_index');
        }

        return $this->render('parents_and_guardians/edit.html.twig', [
            'parents_and_guardian' => $parentsAndGuardian,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parents_and_guardians_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ParentsAndGuardians $parentsAndGuardian): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parentsAndGuardian->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($parentsAndGuardian);
            $entityManager->flush();
        }

        return $this->redirectToRoute('parents_and_guardians_index');
    }
}
