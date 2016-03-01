<?php
namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\TaskBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use ShopBundle\Entity\Orders;

class OrdersController extends Controller
{
    public function newAction(Request $request)
    {
        $user = $this->getUser();
        $userId = $user->getId();
        // create a task and give it some dummy data for this example
        $orders = new Orders();
        $orders->setUserId($userId);
        $orders->setDate('today');

        $form = $this->createFormBuilder($orders)
            ->add('userId', 'text')
            ->add('date', 'text')
            ->add('save', 'submit')
            ->getForm();

        return $this->render('ShopBundle:Orders:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}