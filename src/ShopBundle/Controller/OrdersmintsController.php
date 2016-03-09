<?php
namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ShopBundle\Entity\Mintsorders;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ShopBundle\Entity\Products;


class OrdersmintsController extends Controller
{
    public function newAction(Request $request, $slug)
    {   
        //var failed is used to save state of payment
        $failed = "";
        //var with current user id       
        $user = $this->getUser();
        $userId = $user->getId();

        //db select phone number
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT a.phonenumber FROM ShopBundle:Products a WHERE a.name = :name')->setParameter('name', $slug);
        $products = $query->getResult();
        // form build
        $orders = new Mintsorders();
        $form = $this->createFormBuilder($orders)
            ->add('userId', 'hidden')
            ->add('kod', 'text')
            ->add('Kup', 'submit')
            ->getForm();
        //handle request
        $form->handleRequest($request);
        //checking if form is valid, and submitted
        if ($form->isSubmitted() && $form->isValid()) {
                $data = $form->getData();
                $numer = $data->numer;
                $kod = $data->kod;
                
                   // create curl resource
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,"http://mintshost.pl/sms.php?kod=".$kod."&sms=".$numer."&email=blackdmail8@gmail.com");

                       //return the transfer as a string
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                       // $output contains the output string
                  $output = curl_exec($ch);
                       // close curl resource to free up system resources
                  curl_close($ch);


                switch($output){
                case 0:
                 $failed = "Kod, który wprowadziłeś jest niepoprawny!";
                 break;
                case 1:
                $mintsorders = new Mintsorders();
                    $mintsorders->setUserId($userId);
                    $mintsorders->setNumer($products);
                    $mintsorders->setKod($kod);
                    $mintsorders->setDate(date("Y-m-d h:i:sa"));
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($mintsorders);
                    $em->flush();
                return $this->redirectToRoute('mintsthanks');
                 break;
                case 3:
                 $failed = "Kod nie został wprowadzony";
                 break;
                }

            
        }

   return $this->render('ShopBundle:Ordersmints:new.html.twig', array('form' => $form->createView(), 'failed' => $failed, 'products' => $products));  


        

}};