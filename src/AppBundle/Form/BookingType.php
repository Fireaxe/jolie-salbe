<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\DateTime;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('customerName', TextType::class, [
                'attr' => [
                    'class' => 'control-animate'
                ]
            ])
            ->add('customerNumber', TextType::class, [
                'attr' => [
                    'class' => 'control-animate'
                ]
            ])
            ->add('customerEmail', EmailType::class, [
                'attr' => [
                    'class' => 'control-animate'
                ]
            ])
            ->add('nbCustomer', IntegerType::class, [
                'attr' => [
                    'class' => 'control-animate'
                ]
            ])
            ->add('address', TextType::class, [
                'attr' => [
                    'class' => 'control-animate'
                ]
            ])
            ->add('startDate', DateTimeType::class, [
                'attr' => [
                    'class' => 'control-animate'
                ]
            ])
            ->add('endDate', DateTimeType::class, [
                'attr' => [
                    'class' => 'control-animate'
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'signin',
                'attr' => [
                    'class' => 'btn btn-animate btn-blue',
                    'align' => 'center'
                ]
            ])
        ;
    }

    public function getName()
    {
        return 'booking';
    }
}