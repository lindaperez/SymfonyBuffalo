<?php

namespace B\BuffaloBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use B\BuffaloBundle\Entity\TbRelCompraPlato;
use B\BuffaloBundle\Form\TbRelCompraPlatoType;


class TbCompraType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dtfechaCompra','date', array('required' => false,'label'=> 'Fecha Registro:',
           'widget' => 'single_text'
           // this is actually the default format for single_text
           ))
            ->add('fkIidPersona')
            ->add('fkIidMesa')
            ->add('dcosto')
            ->add('fkIidEstadoCompra')
            ->add('platos','collection',
           array('type'=> new TbRelCompraPlatoType(),
           'label' => ' ',
           'by_reference' => false,
           'prototype' => new TbRelCompraPlato(),
           'allow_add' => true, 
           'allow_delete' => true,
           'required' =>false,
           ))
                
               ;
        
       
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'B\BuffaloBundle\Entity\TbCompra'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'b_buffalobundle_tbcompra';
    }
}