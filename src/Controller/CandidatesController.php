<?php

namespace App\Controller;

use App\Entity\Candidates;
use App\Form\CandidatesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/candidates")
 */
class CandidatesController extends AbstractController
{
    /**
     * @Route("/", name="candidates_index", methods="GET")
     */
    public function index(): Response
    {
        $candidates = $this->getDoctrine()
            ->getRepository(Candidates::class)
            ->findAll();

        return $this->render('candidates/index.html.twig', ['candidates' => $candidates]);
    }

    /**
     * @Route("/new", name="candidates_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $candidate = new Candidates();
        $form = $this->createForm(CandidatesType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($candidate);
            $em->flush();

            return $this->redirectToRoute('candidates_index');
        }

        return $this->render('candidates/new.html.twig', [
            'candidate' => $candidate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCandidat}", name="candidates_show", methods="GET")
     */
    public function show(Candidates $candidate): Response
    {
        return $this->render('candidates/show.html.twig', ['candidate' => $candidate]);
    }

    /**
     * @Route("/{idCandidat}/edit", name="candidates_edit", methods="GET|POST")
     */
    public function edit(Request $request, Candidates $candidate): Response
    {
        $form = $this->createForm(CandidatesType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidates_edit', ['idCandidat' => $candidate->getIdCandidat()]);
        }

        return $this->render('candidates/edit.html.twig', [
            'candidate' => $candidate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCandidat}", name="candidates_delete", methods="DELETE")
     */
    public function delete(Request $request, Candidates $candidate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidate->getIdCandidat(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($candidate);
            $em->flush();
        }

        return $this->redirectToRoute('candidates_index');
    }
}
