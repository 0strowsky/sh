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
   {	$request = Request::createFromGlobals();
   		$request->getUri();
   		$em = $this->getDoctrine()->getManager();
   		$query = $em->createQuery('SELECT DISTINCT a.id, a.category, a.name, a.quantity, a.img, a.description FROM ShopBundle:Products a');
   		$products = $query->getResult();
   		$params = $this->get('router')->match('/products/lenovo_y580');
   		$uri = $this->get('router')->generate('products', array(
   			'slug' => 'lenovo_y580'));
  		return $this->render('ShopBundle:Products:index.html.twig', array('products' => $products, 'request' => $request));
   }
}
