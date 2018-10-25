<?php

namespace App\Controller;

use App\Entity\Departments;
use App\Form\DepartmentsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/departments")
 */
class DepartmentsController extends AbstractController
{
    /**
     * @Route("/", name="departments_index", methods="GET")
     */
    public function index(): Response
    {
        $departments = $this->getDoctrine()
            ->getRepository(Departments::class)
            ->findAll();

        return $this->render('departments/index.html.twig', ['departments' => $departments]);
    }

    /**
     * @Route("/new", name="departments_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $department = new Departments();
        $form = $this->createForm(DepartmentsType::class, $department);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($department);
            $em->flush();

            return $this->redirectToRoute('departments_index');
        }

        return $this->render('departments/new.html.twig', [
            'department' => $department,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDepartment}", name="departments_show", methods="GET")
     */
    public function show(Departments $department): Response
    {
        return $this->render('departments/show.html.twig', ['department' => $department]);
    }

    /**
     * @Route("/{idDepartment}/edit", name="departments_edit", methods="GET|POST")
     */
    public function edit(Request $request, Departments $department): Response
    {
        $form = $this->createForm(DepartmentsType::class, $department);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('departments_edit', ['idDepartment' => $department->getIdDepartment()]);
        }

        return $this->render('departments/edit.html.twig', [
            'department' => $department,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDepartment}", name="departments_delete", methods="DELETE")
     */
    public function delete(Request $request, Departments $department): Response
    {
        if ($this->isCsrfTokenValid('delete'.$department->getIdDepartment(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($department);
            $em->flush();
        }

        return $this->redirectToRoute('departments_index');
    }
}
