<?php

namespace MP\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        if ($this->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:User')->find($this->getUser()->getId());

            return $this->render('AppBundle:Default:default.html.twig', array(
                'entity' => $entity));
        } else {
            return $this->redirect($this->generateUrl('login'));
        }
    }
}
