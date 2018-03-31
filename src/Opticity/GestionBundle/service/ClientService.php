<?php
/**
 * Created by PhpStorm.
 * Date: 29/03/2018
 * Time: 13:25
 */

namespace Opticity\GestionBundle\service;

use Opticity\GestionBundle\Entity\Client;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ClientService extends BaseService
{
    public function getClient($id) {
        $repo = $this->em->getRepository('OpticityGestionBundle:Client');
        return $repo->findClient($id);
    }

    /**
     * @param $params
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function putClient($params) {
        $repo = $this->em->getRepository('Opticity\GestionBundle\Entity\Client');

        foreach ($params as $item) {
            if (!isset($item['code'])) {
                throw new NotFoundHttpException('code doit exister');
            }

            $client = $repo->findOneBy([
                'code' => $item['code']
            ]);

            if (empty($item['nom'])) {
                throw new NotFoundHttpException('Mandatory nom');
            }
            if (empty($item['prenom'])) {
                throw new NotFoundHttpException('Mandatory prenom');
            }
            if (empty($item['adresse'])) {
                throw new NotFoundHttpException('Mandatory adresse');
            }
            if (empty($item['telephone'])) {
                throw new NotFoundHttpException('Mandatory telephone');
            }
            if (empty($item['email'])) {
                throw new NotFoundHttpException('Mandatory email');
            }
            if(filter_var($item['email'], FILTER_VALIDATE_EMAIL) == false) {
                throw new NotFoundHttpException('Mail format invalid');
            }

            if( empty($client) ) {
                $client = new Client();
                $client->setCode($item['code']);
                $client->setNom($item['nom']);
                $client->setPrenom($item['prenom']);
                $client->setAdresse($item['adresse']);
                $client->setEmail($item['email']);
                $client->setTelephone($item['telephone']);
            } else {
                $client->setNom($item['nom']);
                $client->setPrenom($item['prenom']);
                $client->setAdresse($item['adresse']);
                $client->setEmail($item['email']);
                $client->setTelephone($item['telephone']);
            }

            if (!empty($client)) {
                $this->em->persist($client);
                $this->em->flush();
            }
        }
    }
}