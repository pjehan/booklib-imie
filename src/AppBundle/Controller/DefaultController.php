<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $categories = $this->getDoctrine()->getRepository("AppBundle:Category")->findAll();
        $lastBooks = $this->getDoctrine()->getRepository("AppBundle:Book")->findLast(3);
        
        return $this->render('default/index.html.twig', [
            "categories" => $categories,
            "lastBooks" => $lastBooks
        ]);
    }
}
