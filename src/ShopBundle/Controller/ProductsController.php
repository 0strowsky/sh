<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;  
use ShopBundle\Entity\Products;
use ShopBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class ProductsController extends Controller
{ 

   public function indexAction(Request $request, $slug)
   {     
         $userinho = $this->getUser();
         $userId = $userinho->getId();

         $rm = $this->getDoctrine()->getManager();
         $query2 = $rm->createQuery('SELECT DISTINCT a.categorypath, a.category, a.mother FROM ShopBundle:Products a');
         $categories2 = $query2->getResult();

         $km = $this->getDoctrine()->getManager();
         $query3 = $km->createQuery('SELECT a.money FROM ShopBundle:User a WHERE a.id =:id')->setParameter('id', $userId);
         $money_value = $query3->getResult();

   		$em = $this->getDoctrine()->getManager();
   		$query = $em->createQuery('SELECT DISTINCT a.id, a.category, a.name, a.price, a.img, a.description, a.display_name, a.duration FROM ShopBundle:Products a WHERE a.name = :name')->setParameter('name', $slug);
   		$products = $query->getResult();

         $productform = new Products();
         $form = $this->createFormBuilder($productform)
         ->add('Kup', ButtonType::class, array (
            'attr' => array('class' => 'Kup'),
            ))
         ->getForm();
         $form->handleRequest($request);


  		return $this->render('ShopBundle:Products:index.html.twig', array('slug' => $slug, 'products' => $products, 'categories2' => $categories2, 'form' => $form->createView()));
   }
}
