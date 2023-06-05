<?php

namespace App\Form;

use App\Entity\Blog;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlogFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['attr' => array(
                    'class' => 'input-blog',
                    'placeholder' => 'Write a title...',
                ),
                    'label' => false]
            )
            ->add('description', TextType::class, ['attr' => array(
                'class' => 'input-blog',
                'placeholder' => 'Write a description...',
            ),
                'label' => false]
            )
            ->add('content', TextareaType::class, ['attr' => array(
                'class' => 'input-blog',
                'placeholder' => 'Write a content...',
            ),
                'label' => false]
            )
            ->add('date', DateType::class, ['attr' => array(
                'class' => 'input-blog',
            ),
                'label' => false]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Blog::class,
        ]);
    }
}
