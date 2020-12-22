<?php

namespace App\Form;

use App\Entity\Cedula;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class CedulaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rut')
            ->add('ruta_imagen', FileType::class, [
                'label'=>'Archivo Imagen',
                'mapped'=>false,
                'required'=>false
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cedula::class,
        ]);
    }
}
