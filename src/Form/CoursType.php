<?php

namespace App\Form;

use App\Entity\Cours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints as Assert;

class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'attr' => [
                    'class' => 'form-cntrol',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Titre',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'contraints' => [
                    new Assert\Length(['min' => 2, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('contenu', TextType::class, [
                'attr' => [
                    'class' => 'form-cntrol',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Titre',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'contraints' => [
                    new Assert\Length(['min' => 2, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('auteur', TextType::class, [
                'attr' => [
                    'class' => 'form-cntrol',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Titre',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'contraints' => [
                    new Assert\Length(['min' => 2, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('rubrique', TextType::class, [
                'attr' => [
                    'class' => 'form-cntrol',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Titre',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'contraints' => [
                    new Assert\Length(['min' => 2, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                'class' => 'btn btn-primary mt-4'
                ],
        'label' => 'Créer mon cours'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}
