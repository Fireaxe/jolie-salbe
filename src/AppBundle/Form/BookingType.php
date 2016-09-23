<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('customerName')
            ->add('customerNumber')
            ->add('customerEmail')
            ->add('nbCustomer')
            ->add('address')
            ->add('save', SubmitType::class, [
                'label' => 'signin'
            ])
        ;
    }

    public function getName()
    {
        return 'booking';
    }
}