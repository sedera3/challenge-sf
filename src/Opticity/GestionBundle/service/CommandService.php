<?php
/**
 * Created by PhpStorm.
 * User: MADATALY
 * Date: 29/03/2018
 * Time: 20:55
 */

namespace Opticity\GestionBundle\service;

use Doctrine\ORM\OptimisticLockException;
use Opticity\GestionBundle\Entity\Command;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommandService extends BaseService
{
    /**
     * @param $code
     * @return array
     */
    public function getCommand($code) {
        $repo = $this->em->getRepository('OpticityGestionBundle:Command');
        return $repo->findCommand($code);
    }

    public function getPrixTotal($client) {
        $repo = $this->em->getRepository('OpticityGestionBundle:Command');
        return $repo->getPrixTotal($client);
    }

    /**
     * @param $params
     * @throws OptimisticLockException
     * @throws \Exception
     */
    public function putCommand($params) {
        $repo = $this->em->getRepository('Opticity\GestionBundle\Entity\Command');

        foreach ($params as $item) {
            if (!isset($item['code'])) {
                throw new NotFoundHttpException('code doit exister');
            }

            $command = $repo->findOneBy([
                'code' => $item['code']
            ]);

            if (!is_float($item['prix_unitaire'])) {
                throw new NotFoundHttpException("Prix unitaire doit être float");
            }
            if (empty($item['client'])) {
                throw new NotFoundHttpException("Mandatory client code");
            }
            if (empty($item['produit'])) {
                throw new NotFoundHttpException("Mandatory produit code");
            }

            $repoClient = $this->em->getRepository('OpticityGestionBundle:Client');
            $client = $repoClient->findOneBy([
                'code' => $item['client']
            ]);

            if(empty($client)) {
                throw new NotFoundHttpException('Check client valid');
            }

            $repoProduit = $this->em->getRepository('OpticityGestionBundle:Product');
            $produit = $repoProduit->findOneBy([
                'code' => $item['produit']
            ]);

            if(empty($produit)) {
                throw new NotFoundHttpException('Check produit valid');
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
                try {
                    $this->em->flush();
                } catch (OptimisticLockException $e) {
                    throw $e;
                } catch (\Exception $e) {
                    throw $e;
                }
            }
        }
    }

    /**
     * @param $id
     * @throws OptimisticLockException
     * @throws \Exception
     */
    public function deleteCommand($id) {
        $repo = $this->em->getRepository('Opticity\GestionBundle\Entity\Command');

        $command = $repo->findOneBy([
            'id' => $id,
        ]);

        if (!empty($command)) {
            $this->em->remove($command);
            try {
                $this->em->flush();
            } catch (OptimisticLockException $e) {
                throw $e;
            } catch (\Exception $e) {
                throw $e;
            }
        }
    }
}