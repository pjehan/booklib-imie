<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LayoutController extends Controller
{
    
    public function menuAction($route)
    {
        $categories = $this->getDoctrine()->getRepository("AppBundle:Category")->findWithCount();
        
        return $this->render('layout/menu.html.twig', array(
            "route" => $route,
            "categories" => $categories
        ));
    }

}
