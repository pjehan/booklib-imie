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
    
    /**
     * @Route("/book/{id}", name="show_book")
     */
    public function showBookAction(\AppBundle\Entity\Book $book) {
        return $this->render('book/show.html.twig', [
            "book" => $book
        ]);
    }
    
    /**
     * @Route("/category/{id}", name="show_category")
     */
    public function showCategoryAction(\AppBundle\Entity\Category $category) {
        return $this->render('category/show.html.twig', [
            "category" => $category
        ]);
    }
    
}
