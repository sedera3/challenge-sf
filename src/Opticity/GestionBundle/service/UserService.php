<?php
/**
 * Created by PhpStorm.
 * Date: 29/03/2018
 * Time: 13:25
 */

namespace Opticity\GestionBundle\service;

use Opticity\GestionBundle\Entity\Client;


class UserService extends BaseService
{
    public function getUser($id) {
        $repo = $this->em->getRepository('OpticityGestionBundle:Client');
        return $repo->findClient($id);
    }

    public function putUser($params) {
        $repo = $this->em->getRepository('Opticity\GestionBundle\Entity\Client');

        foreach ($params as $item) {
            if (!isset($item['code'])) {
                throw new \Exception('code doit exister');
            }

            $client = $repo->findOneBy([
                'code' => $item['code']
            ]);

            if (empty($item['nom'])) {
                throw new \Exception('Mandatory nom');
            }
            if (empty($item['prenom'])) {
                throw new \Exception('Mandatory prenom');
            }
            if (empty($item['adresse'])) {
                throw new \Exception('Mandatory adresse');
            }
            if (empty($item['telephone'])) {
                throw new \Exception('Mandatory telephone');
            }
            if (empty($item['email'])) {
                throw new \Exception('Mandatory email');
            }
            if(filter_var($item['email'], FILTER_VALIDATE_EMAIL) == false) {
                throw new \Exception('Mail format invalid');
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