<?php

namespace DeteccionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DiscoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nse')
            ->add('fab')
            ->add('cap')
            ->add('modelo')
            ->add('tip')
            ->add('cpu')
            ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DeteccionBundle\Entity\Disco'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'deteccionbundle_disco';
    }
}
