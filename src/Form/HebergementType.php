<?php

namespace App\Form;

use App\Entity\Hebergement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class HebergementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
            ->add('heb_name', TextType::class, [
                'required'  => true,
                'label'     => "Nom de votre hébergement",
                'attr'      => [
                    'placeholder'   => "Ex : Gîte des sapins...",
                    'class'         => "input"
                ]    
            ])
            
            ->add('heb_adresse', TextType::class, [
                'required'  => true,
                'disabled' => $options['is_edit'],
                'label'     => "Adresse",
                'attr'      => [
                    'placeholder'   => "25 rue de la gare",
                    'class'         => "input"
                ]    
            ])

            ->add('heb_adresse_complement', TextType::class, [
                'required'  => true,
                'disabled' => $options['is_edit'],
                'label'     => "Complément d'adresse ",
                'attr'      => [
                    'placeholder'   => "Complément d'adresse",
                    'class'         => "input"
                ]    
            ])
            
            ->add('heb_batiment', TextType::class, [
                'required'  => false,
                'disabled' => $options['is_edit'],
                'label'     => "Bâtiment",
                'attr'      => [
                    'placeholder'   => "Bâtiment",
                    'class'         => "input"
                ]    
            ])
            ->add('heb_etage', IntegerType::class, [
                'required'  => false,
                'disabled' => $options['is_edit'],
                'label'     => "Etage",
                'attr'      => [
                    'placeholder'   => "0 pour Rez-de-chaussée",
                    'class'         => "input",
                    'min'           => 0,
                    'max'           => 20,
                ]    
            ])
            
            ->add('heb_code_postal', NumberType::class, [
                'required'  => true,
                'disabled' => $options['is_edit'],
                'label'     => "Code postal",
                'attr'      => [
                    'placeholder'   => "Code postal",
                    'class'         => "input"
                ]    
            ])
            
            ->add('heb_commune', TextType::class, [
                'required'  => true,
                'disabled' => $options['is_edit'],
                'label'     => "Ville",
                'attr'      => [
                    'placeholder'   => "Commune",
                    'class'         => "input"
                ]    
            ])
            // ->add('heb_lat')
            // ->add('heb_long')
            
            ->add('heb_type', ChoiceType::class, array(
                'disabled' => $options['is_edit'],
                'choices'  => array(
                    'Maison'        => null,
                    'Appartement'   => true,
                    'Autre' => false,
                ),
                'label' => 'Type d\'hébergement',
                'required'  => true,
            ))
            
            ->add('heb_nbr_pieces', IntegerType::class, [
                'required'  => true,
                'disabled' => $options['is_edit'],
                'label'     => 'Nombre de pièces de votre hébergement:',
                'attr'      => [
                    'min' => 0,
                    'max' => 50
                ]    
            ])
            
            ->add('heb_couchages_max', IntegerType::class, [
                'required'  => true,
                'disabled' => $options['is_edit'],
                'label'     => "Nombre de couchages maximal",
                'attr'      => [
                    'placeholder'   => "Nombre de couchages maximal",
                    'class'         => "input",
                    'min' => 0,
                    'max' => 30
                ]    
            ])
            
            ->add('heb_classement', ChoiceType::class, array(
                'choices'  => array(
                    'En cours'   => null,
                    'Oui'       => true,
                    'Non'       => false,
                ),
                'disabled' => $options['is_edit'],
                'label' => 'Votre logement est-il classé?',
                'required'  => true,
            ))
            
            ->add('heb_date_classement', DateType::class, array(
                'widget' => 'choice',
                'disabled' => $options['is_edit'],
                'label'     => "Si oui, date de classement",
            ))
            
            ->add('heb_periodes_location',TextType::class, [
                'label' => "Saison(s) de location",
                'disabled' => $options['is_edit'],
            ])

            // ->add('heb_date_declaration')
            
            // ->add('heb_cerfa')
            
            ->add('heb_descriptif_court',TextareaType::class, [
                'required'  => false,
                'label'     => "Descriptif de l'hébergement",
                'attr'      => [
                    'placeholder' => "Descriptif de votre hébergement",
                    'class' => "textarea",
                    'cols' => '50', 
                    'rows' => '3'
                ]
            ])
            ->add('heb_photo_1', FileType::class, array(
                'data_class' => null,
                'label' => 'Photo mise en avant',   
            ))
            ->add('heb_photo_2')
            ->add('heb_photo_3')

            
            ->add('heb_site_web', TextType::class, [
                'required'  => false,
                'label'     => 'Adresse web de votre hébergement',
                'attr'      => [
                    'placeholder'   => "www.",
                    'class'         => "input"
                ]    
            ])
            
            ->add('heb_site_resa', TextType::class, [
                'required'  => false,
                'label'     => "Si vous disposez d'une réservation en ligne, renseignez votre lien de réservation",
                'attr'      => [
                    'placeholder'   => "Adresse web de réservation",
                    'class'         => "input"
                ]    
            ])
            
            ->add('heb_contact_resa', TextType::class, [
                'required'  => false,
                'label'     => "Contact de réservation",
                'attr'      => [
                    'placeholder'   => "Contact ou nom de l'organisme de gestion de réservation de votre hébergement",
                    'class'         => "input"
                ]    
            ])
            
            ->add('heb_email_resa', TextType::class, [
                'required'  => false,
                'label'     => "Email de réservation",
                'attr'      => [
                    'placeholder'   => "Email",
                    'class'         => "input"
                ]    
            ])
            
            ->add('heb_tel_resa', NumberType::class, [
                'required'  => false,
                'label'     => "Numéro de téléphone de réservation",
                'attr'      => [
                    'placeholder'   => "06 xx xx xx xx",
                    'class'         => "input"
                ]    
            ])
            
            // ->add('heb_date_creation')
            // ->add('heb_statut')
            // ->add('heb_date_suppression')
            // ->add('user')
            // ->add('mairie')
            // ->add('officeTourisme')
            // ->add('ville')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Hebergement::class,
            'is_edit' => false
        ]);
    }
}
