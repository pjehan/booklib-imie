<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LayoutController extends Controller
{
    /**
     * @Route("/menu")
     */
    public function menuAction()
    {
        $categories = $this->getDoctrine()->getRepository("AppBundle:Category")->findAll();
        
        return $this->render('layout/menu.html.twig', array(
            "categories" => $categories
        ));
    }

}
