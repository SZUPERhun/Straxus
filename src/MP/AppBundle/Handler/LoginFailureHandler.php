<?php

namespace MP\AppBundle\Handler;

use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler;

class AuthenticationFailure extends DefaultAuthenticationFailureHandler {
    public function onAuthenticationFailure(\Symfony\Component\HttpFoundation\Request $request, \Symfony\Component\Security\Core\Exception\AuthenticationException $exception) {
        parent::onAuthenticationFailure($request, $exception);
        
        if ($this->logger->getLoginAttempts() == NULL)
            $this->logger->setLoginAttempts(0);
        $attempts = $this->logger->getLoginAttempts();
        $this->logger->setLoginAttempts($attempts++);
    }
}
