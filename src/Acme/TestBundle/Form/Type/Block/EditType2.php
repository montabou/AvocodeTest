<?php

namespace Acme\TestBundle\Form\Type\Block;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use JMS\SecurityExtraBundle\Security\Authorization\Expression\Expression;

class EditType2 extends AbstractType
{
    protected $securityContext;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    
        $formOptions = $this->getFormOption('title', array(  'required' => false,  'label' => 'Title',  'translation_domain' => 'Admin',));
        $builder->add('title', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('content', array(  'required' => true,  'label' => 'Content',  'translation_domain' => 'Admin',));
        $builder->add('content', 'textarea', $formOptions);

    }

    protected function getFormOption($name, array $formOptions)
    {
        return $formOptions;
    }

    public function getName()
    {
        return 'edit_block2';
    }

    public function setSecurityContext($securityContext)
    {
        $this->securityContext = $securityContext;
    }

}
