<?php
namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ShopBundle\Entity\Mintsorders;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class OrdersmintsController extends Controller
{
    public function newAction(Request $request)
    {
        $user = $this->getUser();
        $userId = $user->getId();
        // 
        $orders = new Mintsorders();
        $orders->setUserId($userId);
        $form = $this->createFormBuilder($orders)
            ->add('userId', 'hidden')
            ->add('numer',ChoiceType::class, array(
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
            ->add('date', 'date')
            ->add('save', 'submit')
            ->getForm();


        $form->handleRequest($request);
          

    if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $numer = $data->numer;
            

            $mintsorders = new Mintsorders();
            $mintsorders->setUserId($userId);
            $mintsorders->setNumer($kod);
            $mintsorders->setKod('ge');
            $mintsorders->setDate('2015-04-12');

            $em = $this->getDoctrine()->getManager();
            $em->persist($mintsorders);
            $em->flush();
        return $this->redirectToRoute('mintsthanks');
        
    }

   return $this->render('ShopBundle:Ordersmints:new.html.twig', array('form' => $form->createView()));  


        

}};