<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Form\CandidatType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/candidat")
 */
class CandidatController extends AbstractController
{
    /**
     * @Route("/", name="candidat_index", methods="GET")
     */
    public function index(): Response
    {
        $candidats = $this->getDoctrine()
            ->getRepository(Candidat::class)
            ->findAll();

        return $this->render('candidat/index.html.twig', ['candidats' => $candidats]);
    }

    /**
     * @Route("/new", name="candidat_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $candidat = new Candidat();
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($candidat);
            $em->flush();

            return $this->redirectToRoute('candidat_index');
        }

        return $this->render('candidat/new.html.twig', [
            'candidat' => $candidat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCandidate}", name="candidat_show", methods="GET")
     */
    public function show(Candidat $candidat): Response
    {
        return $this->render('candidat/show.html.twig', ['candidat' => $candidat]);
    }

    /**
     * @Route("/{idCandidate}/edit", name="candidat_edit", methods="GET|POST")
     */
    public function edit(Request $request, Candidat $candidat): Response
    {
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidat_edit', ['idCandidate' => $candidat->getIdCandidate()]);
        }

        return $this->render('candidat/edit.html.twig', [
            'candidat' => $candidat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCandidate}", name="candidat_delete", methods="DELETE")
     */
    public function delete(Request $request, Candidat $candidat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidat->getIdCandidate(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($candidat);
            $em->flush();
        }

        return $this->redirectToRoute('candidat_index');
    }
}
