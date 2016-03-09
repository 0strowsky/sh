<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use ShopBundle\Entity\Products;
use ShopBundle\Entity\User;

class WalletController extends Controller
{
    public function indexAction()
    {
    	$user = $this->getUser();
        $userId = $user->getId();

        $em = $this->getDoctrine()->getManager();
   		$query = $em->createQuery('SELECT  a.id, a.username, a.email, a.lastLogin, a.money FROM ShopBundle:User a WHERE a.id = :id')->setParameter('id', $userId);
   		$user_details = $query->getResult();

        return $this->render('ShopBundle:Wallet:index.html.twig', array('user_details' => $user_details));
    }

}
