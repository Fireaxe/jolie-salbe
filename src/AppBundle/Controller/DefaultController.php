<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Room;
use AppBundle\Form\ContactType;
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
        $em = $this->getDoctrine()->getManager();

        $rooms = $em->getRepository(Room::class)->findAll();

        return $this->render('AppBundle:Front:rooms.html.twig', [
            'rooms' => $rooms
        ]);
    }

    /**
     * @Route("/fishing", name="fishing")
     */
    public function fishingAction(Request $request)
    {
        return $this->render('AppBundle:Front:fishing.html.twig', [

        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(ContactType::class, null);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = (new \Swift_Message($form->get('subject')->getData()))
                ->setFrom($form->get('email')->getData())
                ->setTo($this->getParameter('mailer_user'))
                ->setBody(
                    $this->renderView('@App/Front/mail.html.twig', [
                        'email' => $form->get('email')->getData(),
                        'message' => $form->get('message')->getData(),
                        'name' => $form->get('name')->getData(),
                        'phone' => $form->get('phone')->getData()
                    ]),
                    'text/html'
                )
            ;

            $this->get('mailer')->send($message);

            return $this->redirectToRoute('contact');
        }

        return $this->render('AppBundle:Front:contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
