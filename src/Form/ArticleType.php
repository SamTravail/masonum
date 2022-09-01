<?php

namespace App\Form;

use App\Entity\Articles;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TypeTextType::class,
            [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Titre',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['min'=>'2','max' =>'50']),
                    new Assert\NotBlank()
                ]
            ])
            
            ->add('content', TextareaType::class,
            [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '200',
                    'maxlength' => '200000'
                ],
                'label' => 'Contenu',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['min'=>'200','max' =>'200000']),
                    new Assert\NotBlank()
                ]
            ])
            
            ->add('auteur', TypeTextType::class,
            [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Auteur',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['min'=>'2','max' =>'50']),
                    new Assert\NotBlank()
                ]
            ])
            ->add('submit', SubmitType::class,[
                'attr' => [  
                    'class' => 'btn btn-danger mt-4'],
                    'label' => 'Envoyer'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([            
            'data_class' => Articles::class,
        ]);
    }
}
