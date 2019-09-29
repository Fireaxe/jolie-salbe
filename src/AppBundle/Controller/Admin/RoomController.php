<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Image;
use AppBundle\Entity\Room;
use AppBundle\Form\RoomType;
use AppBundle\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class RoomController extends Controller
{
    /**
     * @Route("/admin/room/index", name="admin.room.index")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rooms = $em->getRepository(Room::class)->findAll();

        return $this->render('AppBundle:Back/Room:index.html.twig', [
            'rooms' => $rooms
        ]);
    }

    /**
     * @Route("/admin/room/create", name="admin.room.create")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(RoomType::class, new Room());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fileUploader = $this->get(FileUploader::class);

            /* @var array $roomFiles */
            $roomFiles = $form->get('images')->getData();

            /* @var Room $room */
            $room = $form->getData();

            if ($roomFiles) {
                $files = [];

                /* @var UploadedFile $file */
                foreach ($roomFiles as $file) {
                    $name = $fileUploader->upload($file);

                    $image = new Image();
                    $image->setName($name);
                    $image->setRoom($room);
                    $files[] = $image;
                }

                $room->setImages($files);
            }

            $em->persist($room);
            $em->flush();

            return $this->redirectToRoute('admin.room.index');
        }

        return $this->render('AppBundle:Back/Room:form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/room/update/{room}", name="admin.room.update")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updateAction(Request $request, Room $room)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(RoomType::class, $room);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fileUploader = $this->get(FileUploader::class);

            /* @var array $roomFiles */
            $roomFiles = $form->get('images')->getData();

            /* @var Room $room */
            $room = $form->getData();

            if ($roomFiles) {
                $files = [];

                /* @var UploadedFile $file */
                foreach ($roomFiles as $file) {
                    $name = $fileUploader->upload($file);

                    $image = new Image();
                    $image->setName($name);
                    $image->setRoom($room);
                    $files[] = $image;
                }

                $room->setImages($files);
            }

            $em->persist($room);
            $em->flush();

            return $this->redirectToRoute('admin.room.index');
        }

        return $this->render('AppBundle:Back/Room:form.html.twig', [
            'form' => $form->createView(),
            'room' => $room
        ]);
    }

    /**
     * @Route("/admin/room/delete/{room}", name="admin.room.delete")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, Room $room)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($room);
        $em->flush();

        return $this->redirectToRoute('admin.room.index');
    }
}
