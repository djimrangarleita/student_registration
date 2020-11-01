<?php

namespace App\Controller;

use App\Entity\RefPayementMethods;
use App\Form\RefPayementMethodsType;
use App\Repository\RefPayementMethodsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ref/payement/methods")
 * @IsGranted("ROLE_ADMIN")
 */
class RefPayementMethodsController extends AbstractController
{
    /**
     * @Route("/", name="ref_payement_methods_index", methods={"GET"})
     */
    public function index(RefPayementMethodsRepository $refPayementMethodsRepository): Response
    {
        return $this->render('ref_payement_methods/index.html.twig', [
            'ref_payement_methods' => $refPayementMethodsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ref_payement_methods_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $refPayementMethod = new RefPayementMethods();
        $form = $this->createForm(RefPayementMethodsType::class, $refPayementMethod);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($refPayementMethod);
            $entityManager->flush();

            return $this->redirectToRoute('ref_payement_methods_index');
        }

        return $this->render('ref_payement_methods/new.html.twig', [
            'ref_payement_method' => $refPayementMethod,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ref_payement_methods_show", methods={"GET"})
     */
    public function show(RefPayementMethods $refPayementMethod): Response
    {
        return $this->render('ref_payement_methods/show.html.twig', [
            'ref_payement_method' => $refPayementMethod,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ref_payement_methods_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RefPayementMethods $refPayementMethod): Response
    {
        $form = $this->createForm(RefPayementMethodsType::class, $refPayementMethod);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ref_payement_methods_index');
        }

        return $this->render('ref_payement_methods/edit.html.twig', [
            'ref_payement_method' => $refPayementMethod,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ref_payement_methods_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RefPayementMethods $refPayementMethod): Response
    {
        if ($this->isCsrfTokenValid('delete' . $refPayementMethod->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($refPayementMethod);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ref_payement_methods_index');
    }
}
