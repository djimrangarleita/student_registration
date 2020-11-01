<?php

namespace App\Controller;

use App\Entity\StudentsRelationships;
use App\Form\StudentsRelationshipsType;
use App\Repository\StudentsRelationshipsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/studentsrelationships")
 * @isGranted("ROLE_ADMIN")
 */
class StudentsRelationshipsController extends AbstractController
{
    /**
     * @Route("/", name="students_relationships_index", methods={"GET"})
     */
    public function index(StudentsRelationshipsRepository $studentsRelationshipsRepository): Response
    {
        return $this->render('students_relationships/index.html.twig', [
            'students_relationships' => $studentsRelationshipsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="students_relationships_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $studentsRelationship = new StudentsRelationships();
        $form = $this->createForm(StudentsRelationshipsType::class, $studentsRelationship);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($studentsRelationship);
            $entityManager->flush();

            return $this->redirectToRoute('students_relationships_index');
        }

        return $this->render('students_relationships/new.html.twig', [
            'students_relationship' => $studentsRelationship,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="students_relationships_show", methods={"GET"})
     */
    public function show(StudentsRelationships $studentsRelationship): Response
    {
        return $this->render('students_relationships/show.html.twig', [
            'students_relationship' => $studentsRelationship,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="students_relationships_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StudentsRelationships $studentsRelationship): Response
    {
        $form = $this->createForm(StudentsRelationshipsType::class, $studentsRelationship);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('students_relationships_index');
        }

        return $this->render('students_relationships/edit.html.twig', [
            'students_relationship' => $studentsRelationship,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="students_relationships_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StudentsRelationships $studentsRelationship): Response
    {
        if ($this->isCsrfTokenValid('delete'.$studentsRelationship->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($studentsRelationship);
            $entityManager->flush();
        }

        return $this->redirectToRoute('students_relationships_index');
    }
}
