<?php

namespace ShopBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @var string
    * @ORM\Column(name="steam_id", type="string", length=255)
    */
    public $steam_id;

    /**
    * @var string
    * @ORM\Column(name="money", type="string", nullable=true)
    */
    public $money;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
     /**
     * Set money
     *
     * @param string $money
     *
     * @return User
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return string
     */
    public function getMoney()
    {
        return $this->money;
    }


}