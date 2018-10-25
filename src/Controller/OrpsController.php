<?php

namespace App\Controller;

use App\Entity\Orps;
use App\Form\OrpsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/orps")
 */
class OrpsController extends AbstractController
{
    /**
     * @Route("/", name="orps_index", methods="GET")
     */
    public function index(): Response
    {
        $orps = $this->getDoctrine()
            ->getRepository(Orps::class)
            ->findAll();

        return $this->render('orps/index.html.twig', ['orps' => $orps]);
    }

    /**
     * @Route("/new", name="orps_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $orp = new Orps();
        $form = $this->createForm(OrpsType::class, $orp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($orp);
            $em->flush();

            return $this->redirectToRoute('orps_index');
        }

        return $this->render('orps/new.html.twig', [
            'orp' => $orp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idOrp}", name="orps_show", methods="GET")
     */
    public function show(Orps $orp): Response
    {
        return $this->render('orps/show.html.twig', ['orp' => $orp]);
    }

    /**
     * @Route("/{idOrp}/edit", name="orps_edit", methods="GET|POST")
     */
    public function edit(Request $request, Orps $orp): Response
    {
        $form = $this->createForm(OrpsType::class, $orp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('orps_edit', ['idOrp' => $orp->getIdOrp()]);
        }

        return $this->render('orps/edit.html.twig', [
            'orp' => $orp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idOrp}", name="orps_delete", methods="DELETE")
     */
    public function delete(Request $request, Orps $orp): Response
    {
        if ($this->isCsrfTokenValid('delete'.$orp->getIdOrp(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($orp);
            $em->flush();
        }

        return $this->redirectToRoute('orps_index');
    }
}
