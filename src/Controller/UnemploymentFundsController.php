<?php

namespace App\Controller;

use App\Entity\UnemploymentFunds;
use App\Form\UnemploymentFundsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/unemployment/funds")
 */
class UnemploymentFundsController extends AbstractController
{
    /**
     * @Route("/", name="unemployment_funds_index", methods="GET")
     */
    public function index(): Response
    {
        $unemploymentFunds = $this->getDoctrine()
            ->getRepository(UnemploymentFunds::class)
            ->findAll();

        return $this->render('unemployment_funds/index.html.twig', ['unemployment_funds' => $unemploymentFunds]);
    }

    /**
     * @Route("/new", name="unemployment_funds_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $unemploymentFund = new UnemploymentFunds();
        $form = $this->createForm(UnemploymentFundsType::class, $unemploymentFund);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($unemploymentFund);
            $em->flush();

            return $this->redirectToRoute('unemployment_funds_index');
        }

        return $this->render('unemployment_funds/new.html.twig', [
            'unemployment_fund' => $unemploymentFund,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUnemploymentFund}", name="unemployment_funds_show", methods="GET")
     */
    public function show(UnemploymentFunds $unemploymentFund): Response
    {
        return $this->render('unemployment_funds/show.html.twig', ['unemployment_fund' => $unemploymentFund]);
    }

    /**
     * @Route("/{idUnemploymentFund}/edit", name="unemployment_funds_edit", methods="GET|POST")
     */
    public function edit(Request $request, UnemploymentFunds $unemploymentFund): Response
    {
        $form = $this->createForm(UnemploymentFundsType::class, $unemploymentFund);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('unemployment_funds_edit', ['idUnemploymentFund' => $unemploymentFund->getIdUnemploymentFund()]);
        }

        return $this->render('unemployment_funds/edit.html.twig', [
            'unemployment_fund' => $unemploymentFund,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUnemploymentFund}", name="unemployment_funds_delete", methods="DELETE")
     */
    public function delete(Request $request, UnemploymentFunds $unemploymentFund): Response
    {
        if ($this->isCsrfTokenValid('delete'.$unemploymentFund->getIdUnemploymentFund(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($unemploymentFund);
            $em->flush();
        }

        return $this->redirectToRoute('unemployment_funds_index');
    }
}
