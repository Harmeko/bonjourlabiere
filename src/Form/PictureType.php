<?php

namespace App\Form;

use App\Entity\Picture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PictureType extends AbstractType
{
    protected $auth;

    public function __construct(AuthorizationCheckerInterface $auth) {
        $this->auth = $auth;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('status')
            ->add('description')
            // ->add('publishingTime')
            // ->add('pictureFilename')
            ->add('picture', FileType::class, [
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
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Veuillez charger une image valide',
                    ])
                ],
            ])
        ;
        

        if($this->auth->isGranted('ROLE_ADMIN')) {
            $builder
                ->add('publishingTime')
                ->add('status', ChoiceType::class, [
                'choices'  => [
                    'soumis' => 'submitted',
                    'accepté' => 'accepted',
                    'rejeté' => 'rejected',
                    'planifié' => 'scheduled'
                    ]
                ]);
        }

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Picture::class,
        ]);
    }
}
