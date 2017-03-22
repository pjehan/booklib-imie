<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Book controller.
 *
 * @Route("box")
 */
class BoxController extends Controller {

    /**
     * Lists all box entities.
     *
     * @Route("/", name="box_index")
     * @Method("GET")
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $boxes = $em->getRepository('AppBundle:Box')->findAll();

        if ($request->isXmlHttpRequest()) {
            $encoder = new JsonEncoder();
            $normalizer = new ObjectNormalizer();
            $normalizer->setIgnoredAttributes(array('borrowsFrom', 'borrowsTo'));
            $serializer = new Serializer(array($normalizer), array($encoder));
            $jsonContent = $serializer->serialize($boxes, 'json');
            return $this->json($jsonContent);
        }

        return $this->render('box/index.html.twig', array(
                    'boxes' => $boxes,
        ));
    }

}
