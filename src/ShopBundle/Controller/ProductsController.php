<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;  
use ShopBundle\Entity\Products;
use ShopBundle\Entity\User;
use ShopBundle\Entity\Orders;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Ijanki\Bundle\FtpBundle\Exception\FtpException;

class ProductsController extends Controller
{
   public function indexAction(Request $request, $slug)
   {     
         $failed = "";
         $rm = $this->getDoctrine()->getManager();
         $query2 = $rm->createQuery('SELECT DISTINCT a.categorypath, a.category, a.mother FROM ShopBundle:Products a');
         $categories2 = $query2->getResult();

         $em = $this->getDoctrine()->getManager();
         $query = $em->createQuery('SELECT DISTINCT a.id, a.category, a.name, a.price, a.img, a.description, a.display_name, a.duration FROM ShopBundle:Products a WHERE a.name = :name')->setParameter('name', $slug);
         $products = $query->getResult();
         var_dump($products);
		 

         $userinho = $this->getUser();
         if($userinho == NULL){
            return $this->render('ShopBundle:Products:index.html.twig', array('slug' => $slug, 'products' => $products, 'categories2' => $categories2));
         }else{
         $userId = $userinho->getId();
         $km = $this->getDoctrine()->getManager();
         $query3 = $km->createQuery('SELECT a.money FROM ShopBundle:User a WHERE a.id =:id')->setParameter('id', $userId);
         $money_value = $query3->getResult();
		
		 
   		

         $productform = new Products();
         $form = $this->createFormBuilder($productform)
         ->add('Kup', 'submit')
         ->getForm();

         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {

				$failed = "";
				$lm = $this->getDoctrine()->getManager();
				$user = $lm->getRepository('ShopBundle:User')->find($userId);
				$usermoney = $user->getMoney();
				 
				 if ($usermoney >=  $money_value[0]["money"]) {
				 $user->setMoney($usermoney - $products[0]["price"]);
				 $order = new Orders();
				 $order->setUserId($userId);
				 $order->setDate(new \DateTime("now"));
				 $order->setProductId(5);

				 $em = $this->getDoctrine()->getManager();
				 $em->persist($order);
				 $em->flush();
					
				 try {
					$ftp = $this->container->get('ijanki_ftp');
					$ftp->connect('195.64.158.32');
					$ftp->login('test', 'xancik123');
					print_r('sukces kurwa');
				 } catch (FtpException $e) {
					echo 'Błąd: ', $e->getMessage();
				 }
				 } else {
					 $failed = 'Niestety, nie masz wystarczającej ilości HolyCoinów! Najpierw doładuj swój portfel!';
				 }

        }

    }
  		return $this->render('ShopBundle:Products:index.html.twig', array('slug' => $slug, 'products' => $products, 'categories2' => $categories2, 'form' => $form->createView()));
      }
}
