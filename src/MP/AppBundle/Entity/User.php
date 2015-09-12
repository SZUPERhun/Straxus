<?php

namespace MP\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="loginattempts", type="integer", nullable=true)
     */
    protected $loginattempts;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set loginattempts
     *
     * @param string $loginattempts
     * @return User
     */
    public function setLoginAttempts($loginattempts) {
        $this->loginattempts = $loginattempts;

        return $this;
    }

    public function addLoginAttempts() {
        if ($this->loginattempts == NULL)
            $this->loginattempts = 0;

        $this->loginattempts++;

        return $this;
    }

    /**
     * Get loginattempts
     *
     * @return integer 
     */
    public function getLoginAttempts()
    {
        return $this->loginattempts;
    }
    
    public function getLastLoginString()
    {
        return $this->getLastLogin()->format('Y-m-d H:i:s');
    }
    
    public function getRolesString()
    {
        if (in_array('ROLE_ADMIN', $this->getRoles()))
            return 'Admin';
        if (in_array('ROLE_SUPER_USER', $this->getRoles()))
            return 'Editor + User';
        if (in_array('ROLE_EDITOR', $this->getRoles()))
            return 'Editor';
        if (in_array('ROLE_LUSER', $this->getRoles()))
            return 'User';
    }
}
