<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin")
 */
class AdminController extends Controller {

    /**
     * @Route("/", name="dashboard")
     */
    public function dashboardAction(Request $request) {
        return $this->render('admin/dashboard/index.html.twig');
    }

}
