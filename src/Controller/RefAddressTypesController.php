<?php

namespace App\Controller;

use App\Entity\RefAddressTypes;
use App\Form\RefAddressTypesType;
use App\Repository\RefAddressTypesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ref/address/types")
 */
class RefAddressTypesController extends AbstractController
{
    /**
     * @Route("/", name="ref_address_types_index", methods={"GET"})
     */
    public function index(RefAddressTypesRepository $refAddressTypesRepository): Response
    {
        return $this->render('ref_address_types/index.html.twig', [
            'ref_address_types' => $refAddressTypesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ref_address_types_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $refAddressType = new RefAddressTypes();
        $form = $this->createForm(RefAddressTypesType::class, $refAddressType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($refAddressType);
            $entityManager->flush();

            return $this->redirectToRoute('ref_address_types_index');
        }

        return $this->render('ref_address_types/new.html.twig', [
            'ref_address_type' => $refAddressType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ref_address_types_show", methods={"GET"})
     */
    public function show(RefAddressTypes $refAddressType): Response
    {
        return $this->render('ref_address_types/show.html.twig', [
            'ref_address_type' => $refAddressType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ref_address_types_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RefAddressTypes $refAddressType): Response
    {
        $form = $this->createForm(RefAddressTypesType::class, $refAddressType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ref_address_types_index');
        }

        return $this->render('ref_address_types/edit.html.twig', [
            'ref_address_type' => $refAddressType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ref_address_types_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RefAddressTypes $refAddressType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$refAddressType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($refAddressType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ref_address_types_index');
    }
}
