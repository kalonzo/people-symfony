<?php

namespace App\Controller;

use App\Entity\Orp;
use App\Form\OrpType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/orp")
 */
class OrpController extends AbstractController
{
    /**
     * @Route("/", name="orp_index", methods="GET")
     */
    public function index(): Response
    {
        $orps = $this->getDoctrine()
            ->getRepository(Orp::class)
            ->findAll();

        return $this->render('orp/index.html.twig', ['orps' => $orps]);
    }

    /**
     * @Route("/new", name="orp_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $orp = new Orp();
        $form = $this->createForm(OrpType::class, $orp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($orp);
            $em->flush();

            return $this->redirectToRoute('orp_index');
        }

        return $this->render('orp/new.html.twig', [
            'orp' => $orp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idOrp}", name="orp_show", methods="GET")
     */
    public function show(Orp $orp): Response
    {
        return $this->render('orp/show.html.twig', ['orp' => $orp]);
    }

    /**
     * @Route("/{idOrp}/edit", name="orp_edit", methods="GET|POST")
     */
    public function edit(Request $request, Orp $orp): Response
    {
        $form = $this->createForm(OrpType::class, $orp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('orp_edit', ['idOrp' => $orp->getIdOrp()]);
        }

        return $this->render('orp/edit.html.twig', [
            'orp' => $orp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idOrp}", name="orp_delete", methods="DELETE")
     */
    public function delete(Request $request, Orp $orp): Response
    {
        if ($this->isCsrfTokenValid('delete'.$orp->getIdOrp(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($orp);
            $em->flush();
        }

        return $this->redirectToRoute('orp_index');
    }
}
