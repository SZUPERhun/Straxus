<?php

namespace MP\AppBundle\Form\Handler;

use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;

class LogoutSuccessHandler implements LogoutSuccessHandlerInterface {

    protected $router;
    protected $em;
    protected $token;

    public function __construct(RouterInterface $router, EntityManager $em, TokenStorage $token) {
        $this->router = $router;
        $this->em = $em;
        $this->token = $token;
    }

    public function onLogoutSuccess(Request $request) {
        $user = $this->em->getRepository('AppBundle:User')->find($this->token->getToken()->getUser()->getId());
        $session = $request->getSession();
        $user->setSession($session);
        $this->em->flush();
        
        $uri = $this->router->generate('app_homepage');
	$response = new RedirectResponse($uri);

        return $response;
    }

}
