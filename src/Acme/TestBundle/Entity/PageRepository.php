<?php

namespace Acme\TestBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PageRepository extends EntityRepository
{
    /**
     * Get page by slug and locale
     *
     * @param string $slug
     * @param string $locale
     *
     * @return Page
     */
    public function getPageBySlug($slug, $locale)
    {
        $query = $this->createQueryBuilder('p')
            ->leftJoin('p.translations', 'pt')
            ->addSelect('pt')
            ->leftJoin('pt.pageTranslationBlocks', 'ptptb')
            ->addSelect('ptptb')
            ->leftJoin('ptptb.block', 'ptptbb')
            ->addSelect('ptptbb')
            ->where('pt.slug = :slug')
            ->andWhere('pt.locale = :locale')
            ->setParameter('slug', $slug)
            ->setParameter('locale', $locale)
            ->getQuery();

        return $query->getOneOrNullResult();
    }
}
