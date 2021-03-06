<?php

namespace Opticity\GestionBundle\Repository;

/**
 * PersonGenreRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PersonGenreRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllGenre() {
        $result = $this->createQueryBuilder('pg')
            ->select('pg.genre', 'pg.libelle')
            ->getQuery()
            ->getArrayResult();

        if (!empty($result)) {
            return [
                "genre" => $result
            ];
        }
        return ["genre" => []];
    }
}
