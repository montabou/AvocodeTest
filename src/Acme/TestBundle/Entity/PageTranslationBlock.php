<?php

namespace Acme\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageTranslationBlock
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\TestBundle\Entity\PageTranslationBlockRepository")
 */
class PageTranslationBlock
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="smallint")
     */
    private $position;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Acme\TestBundle\Entity\PageTranslation", inversedBy="pageTranslationBlocks")
     * @ORM\JoinColumn(name="page_translation_id", referencedColumnName="id", nullable=false)
     */
    private $pageTranslation;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Acme\TestBundle\Entity\Block", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="block_id", referencedColumnName="id", nullable=false)
     */
    private $block;

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
     * Set position
     *
     * @param integer $position
     *
     * @return PageBlock
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set pageTranslation
     *
     * @param \Acme\TestBundle\Entity\PageTranslation $pageTranslation
     *
     * @return PageTranslationBlock
     */
    public function setPageTranslation(\Acme\TestBundle\Entity\PageTranslation $pageTranslation)
    {
        $this->pageTranslation = $pageTranslation;

        return $this;
    }

    /**
     * Get pageTranslation
     *
     * @return \Acme\TestBundle\Entity\PageTranslation 
     */
    public function getPageTranslation()
    {
        return $this->pageTranslation;
    }

    /**
     * Set block
     *
     * @param \Acme\TestBundle\Entity\Block $block
     *
     * @return PageTranslationBlock
     */
    public function setBlock(\Acme\TestBundle\Entity\Block $block)
    {
        $this->block = $block;

        return $this;
    }

    /**
     * Get block
     *
     * @return \Acme\TestBundle\Entity\Block 
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Get readable human entity
     *
     * @return string
     */
    public function __toString()
    {
        return ''.$this->getPageTranslation();
    }
}