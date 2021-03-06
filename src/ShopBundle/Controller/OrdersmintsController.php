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
        $user123 = $this->getUser();
        $userId = $user123->getId();

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
                $failed = "Kod, który wprowadziłeś jest niepoprawny!";
                break;
                case 1:
                 $em = $this->getDoctrine()->getManager();
                    $user = $em->getRepository('ShopBundle:User')->find($userId);

                    if (!$user) {
                        throw $this->createNotFoundException(
                            'Nie masz praw, by tu wchodzić, 403 kurwa');
                                }
                    $usermoney = $user->getMoney();

                    if($numer == '7136'){
                        $user->setMoney($usermoney + '123');
                        $em->flush();
                    }else if($numer == '7255'){
                        $user->setMoney($usermoney + '246');
                        $em->flush();
                    }else if($numer == '7355'){
                        $user->setMoney($usermoney + '369');
                        $em->flush();
                    }else if($numer == '7455'){
                        $user->setMoney($usermoney + '492');
                        $em->flush();
                    }else if($numer == '7555'){
                        $user->setMoney($usermoney + '615');
                        $em->flush();
                    }else if($numer == '7636'){
                        $user->setMoney($usermoney + '738');
                        $em->flush();
                    }else if($numer == '7936'){
                        $user->setMoney($usermoney + '1107');
                        $em->flush();
                    }else if($numer == '91455'){
                        $user->setMoney($usermoney + '1722');
                        $em->flush();
                    }else if($numer == '91955'){
                        $user->setMoney($usermoney + '2337');
                        $em->flush();
                    }else if($numer == '92555'){
                        $user->setMoney($usermoney + '3075');
                        $em->flush();
                    }  

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

                case 3:

                    $failed = "Kod nie został wprowadzony";
                break;
                } 
        }

    return $this->render('ShopBundle:Ordersmints:new.html.twig', array('form' => $form->createView(), 'failed' => $failed, ));  
}};