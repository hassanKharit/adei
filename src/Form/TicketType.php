<?php

namespace App\Form;
use App\Entity\NosServices;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('titre')
        ->add('Nom', TextType::class)
        ->add('Email', TextType::class)
        ->add('Societe', TextType::class)
        ->add('Telephone', NumberType::class)
        ->add('Adresse', TextType::class)
        ->add('Projet_pour_service', ChoiceType::class, [
            'choices' => [
            'Dépannage informatique' =>'Service 1',
            'Réseaux et sécurité' =>'Service 2',
            'Formations' => 'Service 3',
            'Création de sites web' => 'Service 4',
            'Sauvegarde en ligne' => 'Service 5',
            'Récupération de données' =>'Service 6',
            'Assistance à distance' =>'Service 7',
            'Vente de matériel' =>'Service 8',
            'Installation de caméra IP' =>'Service 9',
            ],
        ]) 
        ->add('Description', TextareaType::class)
        ->add('Message', TextareaType::class)
        ->add('files', FileType::class)
        ->add('envoyer',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NosServices::class,
        ]);
    }
}
