<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'placeholder' => 'page.contact.form.name'
                ],
                'required' => true
            ])
            ->add('email', TextType::class, [
                'constraints' => [new Email()],
                'attr' => [
                    'placeholder' => 'page.contact.form.email'
                ],
                'required' => true
            ])
            ->add('phone', TextType::class, [
                'attr' => [
                    'placeholder' => 'page.contact.form.phone'
                ],
                'required' => false
            ])
            ->add('subject', TextType::class, [
                'attr' => [
                    'placeholder' => 'page.contact.form.subject'
                ],
                'required' => true
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'rows' => '6',
                    'placeholder' => 'page.contact.form.message'
                ],
                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null
        ]);
    }

    public function getBlockPrefix()
    {
        return 'contact';
    }
}
