<?php

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Controller\SecurityController as BaseController;

class SecurityController extends BaseController
{
    /**
     * @Route("/login", name="admin.login")
     * @Template("AppBundle:Security:login.html.twig")
     *
     * @param Request $request
     * @return mixed
     */
    public function loginAction(Request $request)
    {
        return parent::loginAction($request);
    }
}
