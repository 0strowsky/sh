<?php
namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ShopBundle\Entity\Mintsorders;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Forms;

class MintsthanksController extends Controller
{
    public function newAction(Request $request)
    { 
        return $this->render('ShopBundle:Mintsthanks:index.html.twig');
     
}};