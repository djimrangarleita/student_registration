<?php

namespace App\Controller;

use App\Entity\StudentClassRegistrations;
use App\Form\StudentClassRegistrationsType;
use App\Repository\StudentClassRegistrationsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/studentclassregistrations")
 * @IsGranted("ROLE_ADMIN")
 * 
 */
class StudentClassRegistrationsController extends AbstractController
{
    /**
     * @Route("/", name="student_class_registrations_index", methods={"GET"})
     */
    public function index(StudentClassRegistrationsRepository $studentClassRegistrationsRepository): Response
    {
        return $this->render('student_class_registrations/index.html.twig', [
            'student_class_registrations' => $studentClassRegistrationsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="student_class_registrations_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $studentClassRegistration = new StudentClassRegistrations();
        $form = $this->createForm(StudentClassRegistrationsType::class, $studentClassRegistration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($studentClassRegistration);
            $entityManager->flush();

            return $this->redirectToRoute('student_class_registrations_index');
        }

        return $this->render('student_class_registrations/new.html.twig', [
            'student_class_registration' => $studentClassRegistration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="student_class_registrations_show", methods={"GET"})
     */
    public function show(StudentClassRegistrations $studentClassRegistration): Response
    {
        return $this->render('student_class_registrations/show.html.twig', [
            'student_class_registration' => $studentClassRegistration,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="student_class_registrations_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StudentClassRegistrations $studentClassRegistration): Response
    {
        $form = $this->createForm(StudentClassRegistrationsType::class, $studentClassRegistration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('student_class_registrations_index');
        }

        return $this->render('student_class_registrations/edit.html.twig', [
            'student_class_registration' => $studentClassRegistration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="student_class_registrations_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StudentClassRegistrations $studentClassRegistration): Response
    {
        if ($this->isCsrfTokenValid('delete' . $studentClassRegistration->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($studentClassRegistration);
            $entityManager->flush();
        }

        return $this->redirectToRoute('student_class_registrations_index');
    }
}
