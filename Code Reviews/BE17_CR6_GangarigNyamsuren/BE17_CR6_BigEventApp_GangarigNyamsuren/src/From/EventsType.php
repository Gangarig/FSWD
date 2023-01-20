<?php
// src/Form/Type/TaskType.php
namespace App\Form;

use App\Entity\Events;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class EventsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ["attr" => ["placeholder" => "Please type the Event name" , "class" => "form-control m-2"]])
            ->add('date', DateTimeType::class, ["attr" => ["class" => " w-25 d-flex form-control m-2"]])
            ->add('description', TextareaType::class, ["attr" => ["placeholder" => "Please add an Event description" , "class" => "form-control m-2"]])
            ->add('capacity', TextType::class, ["attr" => ["class" => "form-control m-2"]])
            ->add('email', TextType::class, ["attr" => ["placeholder" => "Please type an E-mail" , "class" => "form-control m-2"]])
            ->add('phoneNumber', TextType::class, ["attr" => ["placeholder" => "Please type a Phone Number" , "class" => "form-control m-2"]])
            ->add('address', TextType::class, ["attr" => ["placeholder" => "Please type a Event location" , "class" => "form-control m-2"]])
            ->add('url', TextType::class, ["attr" => ["placeholder" => "Please enter a Event website" , "class" => "form-control m-2"]])
            ->add('image', FileType::class, [
                'label' => 'Image',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpg',
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid picture document',
                    ])
                ],
            ])
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Music' => "Music",
                    'Movie' => "Movie",
                    'Theater' => "Theater",
                    'Festival' => "Festival",
                ],
                    "attr" => ["class" => "form-control"]
                ])
            ->add('Submit', SubmitType::class, ["attr" => ["class" => "btn btn-dark m-2"]])


        ;
    }

    public function configureOptions(OptionsResolver $resolver):void
    {
        $resolver->setDefaults([
            'data_class'=> Events::class,
            ]);
    }
}