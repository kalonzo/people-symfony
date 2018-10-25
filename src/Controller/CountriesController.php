<?php

namespace App\Controller;

use App\Entity\Countries;
use App\Form\CountriesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/countries")
 */
class CountriesController extends AbstractController
{
    /**
     * @Route("/", name="countries_index", methods="GET")
     */
    public function index(): Response
    {
        $countries = $this->getDoctrine()
            ->getRepository(Countries::class)
            ->findAll();

        return $this->render('countries/index.html.twig', ['countries' => $countries]);
    }

    /**
     * @Route("/new", name="countries_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $country = new Countries();
        $form = $this->createForm(CountriesType::class, $country);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($country);
            $em->flush();

            return $this->redirectToRoute('countries_index');
        }

        return $this->render('countries/new.html.twig', [
            'country' => $country,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCountry}", name="countries_show", methods="GET")
     */
    public function show(Countries $country): Response
    {
        return $this->render('countries/show.html.twig', ['country' => $country]);
    }

    /**
     * @Route("/{idCountry}/edit", name="countries_edit", methods="GET|POST")
     */
    public function edit(Request $request, Countries $country): Response
    {
        $form = $this->createForm(CountriesType::class, $country);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('countries_edit', ['idCountry' => $country->getIdCountry()]);
        }

        return $this->render('countries/edit.html.twig', [
            'country' => $country,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCountry}", name="countries_delete", methods="DELETE")
     */
    public function delete(Request $request, Countries $country): Response
    {
        if ($this->isCsrfTokenValid('delete'.$country->getIdCountry(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($country);
            $em->flush();
        }

        return $this->redirectToRoute('countries_index');
    }
}
