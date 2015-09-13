<?php

namespace MP\AppBundle\Form\Handler;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface {

    protected $router;
    protected $em;

    public function __construct(RouterInterface $router, EntityManager $em) {
        $this->router = $router;
        $this->em = $em;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token) {
        $username = $_POST['_username'];
        $user = $this->em->getRepository('AppBundle:User')->findOneBy(array('username' => $username));
        $user->setLoginAttempts(0);
        $this->em->flush();
        
        $request->getSession()->set('iscaptcha', 'true');
        
        $uri = $this->router->generate('app_homepage');
	$response = new RedirectResponse($uri);

        return $response;
    }

}
