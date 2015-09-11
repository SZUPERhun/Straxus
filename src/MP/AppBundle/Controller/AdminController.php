<?php

namespace MP\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Admin:index.html.twig');
    }
}
