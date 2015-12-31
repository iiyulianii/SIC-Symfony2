<?php

namespace DeteccionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Conf_redType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ip')
            ->add('ms')
            ->add('pe')
            ->add('dns1')
            ->add('dns2')
            ->add('mac')
            ->add('tred')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DeteccionBundle\Entity\Conf_red'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'deteccionbundle_conf_red';
    }
}
