<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BoController extends Controller
{
    /**
     * @Route("/bo", name="admin")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $newBookings = $em->getRepository('AppBundle:Booking')->findBy(array('isValidate' => false));

        return $this->render('AppBundle:Back:index.html.twig', [
            'newBookings' => $newBookings
        ]);
    }
}
