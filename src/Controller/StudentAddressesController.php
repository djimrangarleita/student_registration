<?php

namespace App\Controller;

use App\Entity\StudentAddresses;
use App\Form\StudentAddressesType;
use App\Repository\StudentAddressesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/student/addresses")
 */
class StudentAddressesController extends AbstractController
{
    /**
     * @Route("/", name="student_addresses_index", methods={"GET"})
     */
    public function index(StudentAddressesRepository $studentAddressesRepository): Response
    {
        return $this->render('student_addresses/index.html.twig', [
            'student_addresses' => $studentAddressesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="student_addresses_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $studentAddress = new StudentAddresses();
        $form = $this->createForm(StudentAddressesType::class, $studentAddress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($studentAddress);
            $entityManager->flush();

            return $this->redirectToRoute('student_addresses_index');
        }

        return $this->render('student_addresses/new.html.twig', [
            'student_address' => $studentAddress,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="student_addresses_show", methods={"GET"})
     */
    public function show(StudentAddresses $studentAddress): Response
    {
        return $this->render('student_addresses/show.html.twig', [
            'student_address' => $studentAddress,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="student_addresses_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StudentAddresses $studentAddress): Response
    {
        $form = $this->createForm(StudentAddressesType::class, $studentAddress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('student_addresses_index');
        }

        return $this->render('student_addresses/edit.html.twig', [
            'student_address' => $studentAddress,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="student_addresses_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StudentAddresses $studentAddress): Response
    {
        if ($this->isCsrfTokenValid('delete'.$studentAddress->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($studentAddress);
            $entityManager->flush();
        }

        return $this->redirectToRoute('student_addresses_index');
    }
}
