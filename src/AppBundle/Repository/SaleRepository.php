<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SaleRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT s FROM AppBundle:Sale s ORDER BY s.name ASC'
            )
            ->getResult();
    }
}