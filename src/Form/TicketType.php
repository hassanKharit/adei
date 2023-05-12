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
        ->add('Nom', TextType::class, [
            'attr' => [
                'placeholder' => 'nom*',                     
              'class'=> 'form-control-sm']
            ])
        ->add('Email', TextType::class, [
            'attr' => [
                'placeholder' => 'email',
                'class'=> 'form-control-sm']] )
        ->add('Societe', TextType::class, [
            'attr' => [
                'placeholder' => 'société',
                'class'=> 'form-control-sm']])
        ->add('Telephone', NumberType::class, [
            'attr' => [
                'placeholder' => 'téléphone',
                'class'=> 'form-control-sm']])
        ->add('Adresse', TextType::class, [
            'attr' => [
                'placeholder' => 'adresse',
                'class'=> 'form-control']])
        ->add("Adresse_intervention", TextType::class, [
            'attr' => [
                'placeholder' => "adresse d'intervention",
                'class'=> 'form-control']])
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
            'class'=> 'form-control form-control-lg',
            'class'=> 'form-control form-control-lg'
            ],
        ]) 
        ->add('Description', TextareaType::class, [
            'attr' => [
                'placeholder' => 'description',
                'class'=> 'form-control-lg']])              //la class form-control permet d'ajuster des modifications
        ->add('Message', TextareaType::class, [
            'attr' => [
                'placeholder' => 'message',
                'class'=> 'form-control-lg']])              //griser le champ de droite à revoir
        ->add('files', FileType::class, [
            'attr' => [
                'placeholder' => 'photo',
                'class'=> 'form-control']])                 //modifier la forme à revoir
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
