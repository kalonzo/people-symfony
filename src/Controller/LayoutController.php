<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
//use App\Controller\Request;

class LayoutController extends AbstractController
{
    /**
     * @Route("/layout", name="layout")
     */
    
      public function headerAction()
    {
        return $this->render('layout/header.html.twig');
    }
 
    public function footerAction()
    {
        return $this->render('layout/footer.html.twig');
    }
    
    
    public function index()
    {
        return $this->render('layout/index.html.twig', [
            'controller_name' => 'LayoutController',
        ]);
    }
}
