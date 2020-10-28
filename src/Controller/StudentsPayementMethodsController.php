<?php

namespace App\Controller;

use App\Entity\StudentsPayementMethods;
use App\Form\StudentsPayementMethodsType;
use App\Repository\StudentsPayementMethodsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/students/payement/methods")
 */
class StudentsPayementMethodsController extends AbstractController
{
    /**
     * @Route("/", name="students_payement_methods_index", methods={"GET"})
     */
    public function index(StudentsPayementMethodsRepository $studentsPayementMethodsRepository): Response
    {
        return $this->render('students_payement_methods/index.html.twig', [
            'students_payement_methods' => $studentsPayementMethodsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="students_payement_methods_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $studentsPayementMethod = new StudentsPayementMethods();
        $form = $this->createForm(StudentsPayementMethodsType::class, $studentsPayementMethod);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($studentsPayementMethod);
            $entityManager->flush();

            return $this->redirectToRoute('students_payement_methods_index');
        }

        return $this->render('students_payement_methods/new.html.twig', [
            'students_payement_method' => $studentsPayementMethod,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="students_payement_methods_show", methods={"GET"})
     */
    public function show(StudentsPayementMethods $studentsPayementMethod): Response
    {
        return $this->render('students_payement_methods/show.html.twig', [
            'students_payement_method' => $studentsPayementMethod,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="students_payement_methods_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StudentsPayementMethods $studentsPayementMethod): Response
    {
        $form = $this->createForm(StudentsPayementMethodsType::class, $studentsPayementMethod);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('students_payement_methods_index');
        }

        return $this->render('students_payement_methods/edit.html.twig', [
            'students_payement_method' => $studentsPayementMethod,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="students_payement_methods_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StudentsPayementMethods $studentsPayementMethod): Response
    {
        if ($this->isCsrfTokenValid('delete'.$studentsPayementMethod->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($studentsPayementMethod);
            $entityManager->flush();
        }

        return $this->redirectToRoute('students_payement_methods_index');
    }
}
