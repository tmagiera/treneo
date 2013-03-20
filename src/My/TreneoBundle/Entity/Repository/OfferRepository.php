<?php

namespace My\TreneoBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * OfferRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OfferRepository extends EntityRepository
{
    public function getLatestOffers() {

        $query = $this->createQueryBuilder("o")
            ->select("o")
            ->addOrderBy("o.createdDate", "DESC")
            ->getQuery();

        $query->useResultCache(true, 5);
        $offers = $query->getResult();

        return $offers;
    }
}
