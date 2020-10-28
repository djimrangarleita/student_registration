<?php

namespace App\Controller;

use App\Entity\RefRelationshipTypes;
use App\Form\RefRelationshipTypesType;
use App\Repository\RefRelationshipTypesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ref/relationship/types")
 */
class RefRelationshipTypesController extends AbstractController
{
    /**
     * @Route("/", name="ref_relationship_types_index", methods={"GET"})
     */
    public function index(RefRelationshipTypesRepository $refRelationshipTypesRepository): Response
    {
        return $this->render('ref_relationship_types/index.html.twig', [
            'ref_relationship_types' => $refRelationshipTypesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ref_relationship_types_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $refRelationshipType = new RefRelationshipTypes();
        $form = $this->createForm(RefRelationshipTypesType::class, $refRelationshipType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($refRelationshipType);
            $entityManager->flush();

            return $this->redirectToRoute('ref_relationship_types_index');
        }

        return $this->render('ref_relationship_types/new.html.twig', [
            'ref_relationship_type' => $refRelationshipType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ref_relationship_types_show", methods={"GET"})
     */
    public function show(RefRelationshipTypes $refRelationshipType): Response
    {
        return $this->render('ref_relationship_types/show.html.twig', [
            'ref_relationship_type' => $refRelationshipType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ref_relationship_types_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RefRelationshipTypes $refRelationshipType): Response
    {
        $form = $this->createForm(RefRelationshipTypesType::class, $refRelationshipType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ref_relationship_types_index');
        }

        return $this->render('ref_relationship_types/edit.html.twig', [
            'ref_relationship_type' => $refRelationshipType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ref_relationship_types_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RefRelationshipTypes $refRelationshipType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$refRelationshipType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($refRelationshipType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ref_relationship_types_index');
    }
}
