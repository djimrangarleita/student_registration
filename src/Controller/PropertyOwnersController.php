<?php

namespace App\Controller;

use App\Entity\PropertyOwners;
use App\Form\PropertyOwnersType;
use App\Repository\PropertyOwnersRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/property/owners")
 * @isGranted("ROLE_ADMIN")
 */
class PropertyOwnersController extends AbstractController
{
    /**
     * @Route("/", name="property_owners_index", methods={"GET"})
     */
    public function index(PropertyOwnersRepository $propertyOwnersRepository): Response
    {
        return $this->render('property_owners/index.html.twig', [
            'property_owners' => $propertyOwnersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="property_owners_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $propertyOwner = new PropertyOwners();
        $form = $this->createForm(PropertyOwnersType::class, $propertyOwner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($propertyOwner);
            $entityManager->flush();

            return $this->redirectToRoute('property_owners_index');
        }

        return $this->render('property_owners/new.html.twig', [
            'property_owner' => $propertyOwner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="property_owners_show", methods={"GET"})
     */
    public function show(PropertyOwners $propertyOwner): Response
    {
        return $this->render('property_owners/show.html.twig', [
            'property_owner' => $propertyOwner,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="property_owners_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PropertyOwners $propertyOwner): Response
    {
        $form = $this->createForm(PropertyOwnersType::class, $propertyOwner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('property_owners_index');
        }

        return $this->render('property_owners/edit.html.twig', [
            'property_owner' => $propertyOwner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="property_owners_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PropertyOwners $propertyOwner): Response
    {
        if ($this->isCsrfTokenValid('delete'.$propertyOwner->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($propertyOwner);
            $entityManager->flush();
        }

        return $this->redirectToRoute('property_owners_index');
    }
}
