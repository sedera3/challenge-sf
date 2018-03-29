<?php
/**
 * Created by PhpStorm.
 * Date: 29/03/2018
 * Time: 13:24
 */

namespace Opticity\GestionBundle\service;

use Opticity\GestionBundle\Entity\Fournisseur;


class FournisseurService extends BaseService
{
    public function getFournisseur($code) {
        $repo = $this->em->getRepository('OpticityGestionBundle:Fournisseur');
        return $repo->findOneOrAllFournisseur($code);
    }

    public function putFournisseur($params) {
        $repo = $this->em->getRepository('Opticity\GestionBundle\Entity\Fournisseur');

        foreach ($params as $item) {
            if (!isset($item['code'])) {
                throw new \Exception('code doit exister');
            }

            $fournisseur = $repo->findOneBy([
                'code' => $item['code']
            ]);

            if( empty($fournisseur) ) {
                $fournisseur = new Fournisseur();
                $fournisseur->setCode($item['code']);
                $fournisseur->setFournisseur($item['fournisseur']);

            } else {
                $fournisseur->setFournisseur($item['fournisseur']);
            }

            if (!empty($fournisseur)) {
                $this->em->persist($fournisseur);
                $this->em->flush();
            }
        }
    }

    /**
     * todo add return
     * @param $id
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function deleteFournisseur($id) {
        $repo = $this->em->getRepository('Opticity\GestionBundle\Entity\Fournisseur');

        $fournisseur = $repo->findOneBy([
            'id' => $id,
        ]);

        if (!empty($fournisseur)) {
            $this->em->remove($fournisseur);
            $this->em->flush();
        }
    }
}