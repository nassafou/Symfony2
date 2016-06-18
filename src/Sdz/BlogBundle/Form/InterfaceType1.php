<?php
namespace Sdz\BlogBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class InterfaceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder// Metre tous les champs sans la 
            //->add('dateEdition')
            //->add('publication')
            ->add('nom')
            ->add('description')
            ->add('prix')
            ->add('poids')
            //->add('categories')    
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sdz\BlogBundle\Entity\Interface1'
        ));
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'sdz_blogbundle_interface1';
    }
}