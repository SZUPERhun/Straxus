<?php

namespace MP\AppBundle\Form\Handler;

use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginFailureHandler implements AuthenticationFailureHandlerInterface {

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
        $loginattempts = $request->getSession()->get('loginattempts');
        $loginattempts++;
        $request->getSession()->set('loginattempts', $loginattempts);
        
        
        if ($loginattempts > 2)
            $request->getSession()->set('iscaptcha', 'false');
        else
            $request->getSession()->set('iscaptcha', 'true');

        $referer_url = $request->headers->get('referer');
	$response = new RedirectResponse($referer_url);

        return $response;
    }

}
