<?php

namespace ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Compontent\Form\Extension\Core\Type\BaseType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        // add your custom field
        $builder->add('steam_id');


        //...............
        //Add all your properties here with $builder->add('property name')
    }

        public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }


    public function getBlockPrefix()
    {
        return 'shop_registration';
    }
    public function getSteamId()
    {
       return $this->getBlockPrefix();
    }
}