<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Booking;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BoController extends Controller
{
    /**
     * @Route("/bo", name="admin.index")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $newBookings = $em->getRepository('AppBundle:Booking')->findBy(array('isValidate' => false, 'isRefuse' => false));

        return $this->render('AppBundle:Back:index.html.twig', [
            'newBookings' => $newBookings
        ]);
    }
}

