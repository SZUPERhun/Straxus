<?php

namespace MP\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

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
     * @var array
     * 
     * @ORM\Column(name="session", type="array", nullable=true)
     */
    protected $session;

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
     * Set session
     *
     * @param array $session
     * @return User
     */
    public function setSession($session) {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return array 
     */
    public function getSession()
    {
        return $this->session;
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
