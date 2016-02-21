<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;  
use ShopBundle\Entity\Products;
use ShopBundle\Entity\User;

class ProductsController extends Controller
{ 
   public function indexAction()
   {
   		$em = $this->getDoctrine()->getManager();
   		$query = $em->createQuery('SELECT DISTINCT a.category, a.name, a.quantity, a.img, a.description FROM ShopBundle:Products a');
   		$products = $query->getResult();
   		$current_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   		return $this->render('ShopBundle:Products:index.html.twig', array('products' => $products, 'current_url' => $current_url));
   }
}