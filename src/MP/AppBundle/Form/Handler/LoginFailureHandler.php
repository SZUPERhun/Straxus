<?php

namespace MP\AppBundle\Form\Handler;

use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginFailureHandler implements AuthenticationFailureHandlerInterface {

    protected $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
        $username = $_POST['_username'];
        $user = $this->em->getRepository('AppBundle:User')->findOneBy(array('username' => $username));
        $user->addLoginAttempts();
        
        if ($user->getLoginAttempts() == 3)
            $request->getSession()->set('iscaptcha', 'false');
        else
            $request->getSession()->set('iscaptcha', 'true');

        $referer_url = $request->headers->get('referer');
	$response = new RedirectResponse($referer_url);

        return $response;
    }

}
