<?php
namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ShopBundle\Entity\Mintsorders;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use ShopBundle\Entity\User;


class OrdersmintsController extends Controller
{
    public function newAction(Request $request)
    {   
        
                    
        $failed = "";
        $user = $this->getUser();
        $userId = $user->getId();
        // 
        $rm = $this->getDoctrine()->getManager();
                    $query2 = $rm->createQuery('SELECT a.money FROM ShopBundle:User a WHERE a.id = :id')->setParameter('id', $userId);
                    $actualvalue = $query2->getResult();
        $orders = new Mintsorders();
        $orders->setUserId($userId);
        $form = $this->createFormBuilder($orders)
            ->add('userId', 'hidden')
            ->add('numer', ChoiceType::class, array(
                'choices' => array(
                    '7136(1.23zł)' => '7136',
                    '7255(2.46zł)' => '7255',
                    '7255(3.69zł)' => '7355',
                    '7455(4.92zł)' => '7455',
                    '7555(6.15zł)' => '7555',
                    '7636(7.38zł)' => '7636',
                    '7936(11.07zł)' => '7936',
                    '91455(17.22zł)' => '91455',
                    '91955(23.37zł)' => '91955',
                    '92555(30.75zł)' => '92555'
                    )))
            ->add('kod', 'text')
            ->add('Kup', 'submit')
            ->getForm();
        $form->handleRequest($request);

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
                    

       

                    $mintsorders = new Mintsorders();
                    $mintsorders->setUserId($userId);
                    $mintsorders->setNumer($numer);
                    $mintsorders->setKod($kod);
                    $mintsorders->setDate(date("Y-m-d h:i:sa"));
                  
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($mintsorders);
                    $em->flush();


                return $this->redirectToRoute('mintsthanks');
                
                 break;
                case 1:
        $failed = "Kod, który wprowadziłeś jest niepoprawny!";
                 break;
                case 3:
                 $failed = "Kod nie został wprowadzony";
                 break;
                }


                
            
        }

   return $this->render('ShopBundle:Ordersmints:new.html.twig', array('form' => $form->createView(), 'failed' => $failed, 'actualvalue' => $actualvalue));  


        

}};