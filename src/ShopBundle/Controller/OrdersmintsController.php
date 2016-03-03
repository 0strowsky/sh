<?php
namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ShopBundle\Entity\Mintsorders;
use Symfony\Component\HttpFoundation\Request;


class OrdersmintsController extends Controller
{
    public function newAction(Request $request)
    {
        $user = $this->getUser();
        $userId = $user->getId();
        // create a task and give it some dummy data for this example
        $orders = new Mintsorders();
        $orders->setUserId($userId);
        $orders->setNumer('38258238');
        $orders->setKod('32523');

        $form = $this->createFormBuilder($orders)
            ->add('userId', 'text')
            ->add('numer', 'text')
            ->add('kod', 'text')
            ->add('save', 'submit')
            ->getForm();

        return $this->render('ShopBundle:Ordersmints:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}