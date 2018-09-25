<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/index", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:Front:index.html.twig', [

        ]);
    }

    /**
     * @Route("/rooms", name="rooms")
     */
    public function roomAction(Request $request)
    {
        return $this->render('AppBundle:Front:rooms.html.twig', [

        ]);
    }

    /**
     * @Route("/fishing", name="fishing")
     */
    public function fishingAction(Request $request)
    {
        return $this->render('AppBundle:Front:informations.html.twig', [

        ]);
    }
}
