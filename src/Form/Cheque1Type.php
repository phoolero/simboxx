<?php

namespace App\Form;

use App\Entity\Cheque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Cheque1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('serie')
            ->add('MontoNumero')
            ->add('MontoLetras')
            ->add('TarjadoOrden')
            ->add('TarjadoAlPortador')
            ->add('beneficiario')
            ->add('FirmaTitular')
            ->add('FirmaBeneficiarioAtravesada')
            ->add('cruzado')
            ->add('CruzadoEspecialBanco')
            ->add('NumeroDiasCheque')
            ->add('NumeroDiasRevalidacion')
            ->add('RevalidacionFirma')
            ->add('EndosoDepositoCuenta')
            ->add('EndosoDepositoFirma')
            ->add('EndosoDepositoRut')
            ->add('EndosoRegularFirma')
            ->add('EndosoRegularRut')
            ->add('EndosoRegularNombre')
            ->add('Error')
            ->add('cuenta')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cheque::class,
        ]);
    }
}
