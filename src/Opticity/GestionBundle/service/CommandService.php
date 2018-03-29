<?php
/**
 * Created by PhpStorm.
 * User: MADATALY
 * Date: 29/03/2018
 * Time: 20:55
 */

namespace Opticity\GestionBundle\service;

use Opticity\GestionBundle\Entity\Command;

class CommandService extends BaseService
{
    public function getCommand($code) {
        $repo = $this->em->getRepository('OpticityGestionBundle:Command');
        return $repo->findCommand($code);
    }

    public function putCommand($params) {
        $repo = $this->em->getRepository('Opticity\GestionBundle\Entity\Command');

        foreach ($params as $item) {
            if (!isset($item['code'])) {
                throw new \Exception('code doit exister');
            }

            $command = $repo->findOneBy([
                'code' => $item['code']
            ]);

            if (!is_float($item['prix_unitaire'])) {
                throw new \Exception("Prix unitaire doit être float");
            }
            if (empty($item['client'])) {
                throw new \Exception("Mandatory client code");
            }
            if (empty($item['produit'])) {
                throw new \Exception("Mandatory produit code");
            }

            $repoClient = $this->em->getRepository('OpticityGestionBundle:Client');
            $client = $repoClient->findOneBy([
                'code' => $item['client']
            ]);

            if(empty($client)) {
                throw new \Exception('Check client valid');
            }

            $repoProduit = $this->em->getRepository('OpticityGestionBundle:Product');
            $produit = $repoClient->findOneBy([
                'code' => $item['produit']
            ]);

            if(empty($produit)) {
                //throw new \Exception('Check produit valid');
            }

            if( empty($command) ) {
                $command = new Command();
                $command->setCode($item['code']);
                $command->setDescription($item['description']);
                $command->setPrixUnitaire($item['prix_unitaire']);
                //$command->setPrixTotal($item['prix_total']);
                $command->addClient($client);
                $command->addProduit($produit);

            } else {
                $command->setDescription($item['description']);
                $command->setPrixUnitaire($item['prix_unitaire']);
                //$command->setPrixTotal($item['prix_total']);
                $command->addClient($client);
                $command->addProduit($produit);
            }

            if (!empty($command)) {
                $this->em->persist($command);
                $this->em->flush();
            }
        }
    }

    public function deleteCommand($id) {
        $repo = $this->em->getRepository('Opticity\GestionBundle\Entity\Command');

        $command = $repo->findOneBy([
            'id' => $id,
        ]);

        if (!empty($command)) {
            $this->em->remove($command);
            $this->em->flush();
        }
    }
}