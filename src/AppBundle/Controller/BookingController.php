<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Booking;
use AppBundle\Form\BookingType;

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

    /**
     * @Route("/new", name="admin.booking.new")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new Booking();

        $form = $this->createForm(BookingType::class, $entity, [
            'attr' => [
                'class' => "form-horizontal"
            ],
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'save',
                'create'
            );

            return $this->redirect($this->generateUrl('admin.booking'));
        }

        return $this->render('AppBundle:Back/Booking:new.html.twig', [
            'entity' => $entity,
            'form' => $form->createView()
        ]);
    }
}
