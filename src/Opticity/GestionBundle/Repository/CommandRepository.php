<?php

namespace Opticity\GestionBundle\Repository;
use Doctrine\ORM\NonUniqueResultException;

/**
 * CommandRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommandRepository extends \Doctrine\ORM\EntityRepository
{
    public function findCommand($code) {
        $qb = $this->createQueryBuilder('c')
            ->select('c', 'cl', 'p')
            ->innerJoin('c.client', 'cl')
            ->innerJoin('c.produit', 'p');

        if (!empty($code)) {

            $qb->where('f.code in (:code)')
                ->setParameters([
                    'code' => $code
                ]);
        }

        $result = $qb->getQuery()
            ->getArrayResult();

        if (!empty($result)) {
            return [
                "command" => $result
            ];
        }
        return [
            "command" => []
        ];
    }

    /**
     * @param $client
     * @return array
     * @throws NonUniqueResultException
     * @throws \Exception
     */
    public function getPrixTotal($client) {
        $qb = $this->createQueryBuilder('c')
            ->select('SUM(c.prixUnitaire) as prixTotal')
            ->innerJoin('c.client', 'cl')
            ->where('cl.code in (:cl_code)')
            ->setParameters([
                'cl_code' => $client
            ]);

        try {
            $result = $qb->getQuery()
                ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }

        if (!empty($result)) {

            return [
                "prix_total" => [
                    "client" => $client,
                    "prix_total" => (int) $result['prixTotal']
                ]
            ];
        }
        return [
            "prix_total" => [
                "client" => $client,
                "prix_total" => 0
            ]
        ];
    }
}
