<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Candidat;

class HomepageController extends AbstractController
{
    /**
     * @Route("/homepage", name="homepage")
     */
    public function index()
    {
     
        
        // get entity manager
        $em = $this->getDoctrine()->getManager();
  
        
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'nb_candidates' => $em->getRepository(Candidat::class)->count([]),
            'nb_candidates_bilan' => $em->getRepository(Candidat::class)->count(["doBilan"=>1]),
        ]);
    }
}
