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
   {     
         $rm = $this->getDoctrine()->getManager();
         $query2 = $rm->createQuery('SELECT DISTINCT a.categorypath, a.category, a.mother FROM ShopBundle:Products a');
         $categories2 = $query2->getResult();

   		$em = $this->getDoctrine()->getManager();
   		$query = $em->createQuery('SELECT DISTINCT a.id, a.category, a.name, a.price, a.img, a.description FROM ShopBundle:Products a WHERE a.name = :name')->setParameter('name', $slug);
   		$products = $query->getResult();
   		
  		return $this->render('ShopBundle:Products:index.html.twig', array('slug' => $slug, 'products' => $products, 'categories2' => $categories2));
   }
}
