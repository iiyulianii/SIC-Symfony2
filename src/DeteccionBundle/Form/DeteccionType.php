<?php

namespace DeteccionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeteccionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('seg1')
            ->add('seg2')
            ->add('seg3')
            ->add('seg4')
            ->add('seg5')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DeteccionBundle\Entity\Deteccion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'deteccionbundle_deteccion';
    }
}
