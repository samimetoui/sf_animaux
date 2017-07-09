<?php

namespace AnimauxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnimalType extends AbstractType {

 /**
  * @param FormBuilderInterface $builder
  * @param array $options
  */
 public function buildForm(FormBuilderInterface $builder, array $options) {
  $builder
          ->add('titre')
          ->add('description', 'textarea', array(
              'required' => false,
          ))
          ->add('url')
  /* ->add('date') */
  ;
 }

 /**
  * @param OptionsResolverInterface $resolver
  */
 public function setDefaultOptions(OptionsResolverInterface $resolver) {
  $resolver->setDefaults(array(
      'data_class' => 'AnimauxBundle\Entity\Animal'
  ));
 }

 /**
  * @return string
  */
 public function getName() {
  return 'tuto_animauxbundle_animal';
 }

}
