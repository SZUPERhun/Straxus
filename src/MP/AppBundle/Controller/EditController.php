<?php

namespace MP\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EditController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Edit:edit.html.twig');
    }
}
