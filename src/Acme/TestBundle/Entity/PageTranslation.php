<?php

namespace Acme\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * PageTranslation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\TestBundle\Entity\PageTranslationRepository")
 */
class PageTranslation
{
    use ORMBehaviors\Translatable\Translation;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Acme\TestBundle\Entity\PageTranslationBlock", mappedBy="pageTranslation", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $pageTranslationBlocks;

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return PageTranslation
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return PageTranslation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pageTranslationBlocks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pageTranslationBlocks
     *
     * @param \Acme\TestBundle\Entity\PageTranslationBlock $pageTranslationBlocks
     *
     * @return PageTranslation
     */
    public function addPageTranslationBlock(\Acme\TestBundle\Entity\PageTranslationBlock $pageTranslationBlocks)
    {
        $pageTranslationBlocks->setPageTranslation($this);
        $this->pageTranslationBlocks[] = $pageTranslationBlocks;

        return $this;
    }

    /**
     * Remove pageTranslationBlocks
     *
     * @param \Acme\TestBundle\Entity\PageTranslationBlock $pageTranslationBlocks
     */
    public function removePageTranslationBlock(\Acme\TestBundle\Entity\PageTranslationBlock $pageTranslationBlocks)
    {
        $this->pageTranslationBlocks->removeElement($pageTranslationBlocks);
    }

    /**
     * Get pageTranslationBlocks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPageTranslationBlocks()
    {
        return $this->pageTranslationBlocks;
    }

    /**
     * Get readable human entity
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }
}