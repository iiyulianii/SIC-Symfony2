<?php

namespace DeteccionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use DeteccionBundle\Form\Type\DiscoType;
use DeteccionBundle\Form\Type\MemoriaType;
use DeteccionBundle\Form\Type\TredType;
use DeteccionBundle\Form\Type\UopticaType;
use DeteccionBundle\Form\Type\Aplicativo;
class CpuType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nse')
            ->add('nom')
            ->add('fab')
            ->add('sepro')
            ->add('nopro')
            ->add('nupro')
            ->add('lopro')
            ->add('vepro')        
            ->add('fapro')
            ->add('arpro')
            ->add('rol')
            ->add('seccion')
            ->add('aplicativos')
            ->add('discos', 'collection', array(
                    'type'         => new DiscoType(),
                    'label' => 'Discos Duros',
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'by_reference' => false,
                    
                ))
            ->add('memorias', 'collection', array(
                    'type'         => new MemoriaType(),
                    'label' => 'RAM',
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'by_reference' => false,                    
                ))
            ->add('tredes', 'collection', array(
                    'type'         => new TredType(),
                    'label' => 'Tarjetas de RED',
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'by_reference' => false,                    
                ))
            ->add('uopticas', 'collection', array(
                    'type'         => new UopticaType(),
                    'label' => 'U. Optica',
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'by_reference' => false,                    
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DeteccionBundle\Entity\Cpu'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'deteccionbundle_cpu';
    }
}
