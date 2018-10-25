<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Candidates;

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
            'nbCandidates' => $em->getRepository(Candidates::class)->count([]),
            'doBilan' => $em->getRepository(Candidates::class)->count(["doBilan"=>1]),
        ]);
    }
}
