<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;  
use ShopBundle\Entity\Products;
use ShopBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class ProductsController extends Controller
{ 

   public function indexAction($slug)
   {	 $request = Request::createFromGlobals();
   		$request->getUri();
   		$em = $this->getDoctrine()->getManager();
   		$query = $em->createQuery('SELECT DISTINCT a.id, a.category, a.name, a.price, a.img, a.description FROM ShopBundle:Products a WHERE a.name = :name')->setParameter('name', $slug);
   		$products = $query->getResult();
   		
  		return $this->render('ShopBundle:Products:index.html.twig', array('slug' => $slug, 'products' => $products, 'request' => $request));
   }
}
