<?php

namespace AppBundle\Form;

use AppBundle\Entity\Room;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description'
            ])
            ->add('equipment', TextareaType::class, [
                'label' => 'Equipement'
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix'
            ])
            ->add('open', CheckboxType::class, [
                'label' => 'Ouvrir'
            ])
            ->add('images', FileType::class, [
                'multiple' => true,
                'label' => 'Image',
                'mapped' => false,
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Room::class
        ]);
    }

    public function getBlockPrefix()
    {
        return 'room';
    }
}
