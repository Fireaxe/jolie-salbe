<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class BookingController
 * @package AppBundle\Controller
 *
 * @Route("/bo/booking")
 */
class BookingController extends Controller
{
    /**
     * @Route("/index", name="admin.booking")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Booking')->findAll();

        return $this->render('AppBundle:Back/Booking:index.html.twig', [
            'entity' => $entity
        ]);
    }
}
