<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Room;
use AppBundle\Form\RoomType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RoomController extends Controller
{
    /**
     * @Route("/admin/room/index", name="admin.room.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        return $this->render('AppBundle:Back/Room:index.html.twig', [
        ]);
    }

    /**
     * @Route("/admin/room/create", name="admin.room.create")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(RoomType::class, new Room());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($form->getData());
            $em->flush();
        }

        return $this->render('AppBundle:Back/Room:form.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
