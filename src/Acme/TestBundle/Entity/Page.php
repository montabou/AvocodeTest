<?php

namespace Acme\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Page
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\TestBundle\Entity\PageRepository")
 */
class Page
{
    use ORMBehaviors\Translatable\Translatable;

    /**
     * Proxy all methods to the delegate.
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return $this->proxyCurrentLocaleTranslation($method, $arguments);
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get readable human entity
     *
     * @return string
     */
    public function __toString()
    {
        return ''.$this->getId();
    }
}