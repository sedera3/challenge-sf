<?php

namespace Opticity\GestionBundle\Repository;

/**
 * LunetteTypeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LunetteTypeRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllProduct() {
        $result = $this->createQueryBuilder('lt')
            ->select('lt.abbrev', 'lt.type')
            ->getQuery()
            ->getArrayResult();

        if (!empty($result)) {
            return [
                "type" => $result
                ];
        }
        return [];
    }
}