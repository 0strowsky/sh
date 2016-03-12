<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ShopBundle\Entity\Products;
use ShopBundle\Entity\User;

class CategoryController extends Controller
{ 
   public function indexAction($slug)
   {
   		$rm = $this->getDoctrine()->getManager();
        $query2 = $rm->createQuery('SELECT DISTINCT a.categorypath, a.category, a.mother FROM ShopBundle:Products a');
        $categories2 = $query2->getResult();

   		$em = $this->getDoctrine()->getManager();
   		$query = $em->createQuery('SELECT a.id ,a.category, a.name, a.price, a.img, a.description, a.img_min, a.display_name FROM ShopBundle:Products a WHERE a.categorypath = :path ')->setParameter('path', $slug);
   		$categories = $query->getResult();
   		return $this->render('ShopBundle:Category:index.html.twig', array('categories' => $categories, 'categories2' => $categories2));
   }
}
