<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CompanyController extends Controller
{
    /**
     * @Route("/companies", name="company_list")
     */
    public function listAction()
    {
        return $this->render('AppBundle:Company:list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/company/{id}", name="company_show", requirements={"page":"\d+"})
     */
    public function showAction()
    {
        return $this->render('AppBundle:Company:show.html.twig', array(
            // ...
        ));
    }

}
