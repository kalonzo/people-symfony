<?php

namespace App\Controller;

use App\Entity\UnemploymentFund;
use App\Form\UnemploymentFundType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/unemployment/fund")
 */
class UnemploymentFundController extends AbstractController
{
    /**
     * @Route("/", name="unemployment_fund_index", methods="GET")
     */
    public function index(): Response
    {
        $unemploymentFunds = $this->getDoctrine()
            ->getRepository(UnemploymentFund::class)
            ->findAll();

        return $this->render('unemployment_fund/index.html.twig', ['unemployment_funds' => $unemploymentFunds]);
    }

    /**
     * @Route("/new", name="unemployment_fund_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $unemploymentFund = new UnemploymentFund();
        $form = $this->createForm(UnemploymentFundType::class, $unemploymentFund);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($unemploymentFund);
            $em->flush();

            return $this->redirectToRoute('unemployment_fund_index');
        }

        return $this->render('unemployment_fund/new.html.twig', [
            'unemployment_fund' => $unemploymentFund,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUnemploymentFund}", name="unemployment_fund_show", methods="GET")
     */
    public function show(UnemploymentFund $unemploymentFund): Response
    {
        return $this->render('unemployment_fund/show.html.twig', ['unemployment_fund' => $unemploymentFund]);
    }

    /**
     * @Route("/{idUnemploymentFund}/edit", name="unemployment_fund_edit", methods="GET|POST")
     */
    public function edit(Request $request, UnemploymentFund $unemploymentFund): Response
    {
        $form = $this->createForm(UnemploymentFundType::class, $unemploymentFund);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('unemployment_fund_edit', ['idUnemploymentFund' => $unemploymentFund->getIdUnemploymentFund()]);
        }

        return $this->render('unemployment_fund/edit.html.twig', [
            'unemployment_fund' => $unemploymentFund,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUnemploymentFund}", name="unemployment_fund_delete", methods="DELETE")
     */
    public function delete(Request $request, UnemploymentFund $unemploymentFund): Response
    {
        if ($this->isCsrfTokenValid('delete'.$unemploymentFund->getIdUnemploymentFund(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($unemploymentFund);
            $em->flush();
        }

        return $this->redirectToRoute('unemployment_fund_index');
    }
}
