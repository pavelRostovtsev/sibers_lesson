<?php

namespace AppBundle\Repository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends \Doctrine\ORM\EntityRepository
{
    public function findActive()
    {
        /*
         * @return Product[]
         */
        return $this
            ->createQueryBuilder('product')
            ->where('product.active = :active')
            ->setParameter('active', '1')
            ->getQuery()
            ->getResult()
        ;
    }

}
