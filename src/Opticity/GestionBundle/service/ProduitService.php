<?php
/**
 * Created by PhpStorm.
 * Date: 29/03/2018
 * Time: 10:29
 */

namespace Opticity\GestionBundle\service;

use Opticity\GestionBundle\Entity\PersonGenre;
use Opticity\GestionBundle\Entity\Product;

class ProduitService extends BaseService
{
    /**
     * Pour inserer les types de produit
     * @param $params
     * @throws \Exception
     */
    public function putTypeProduit($params) {

        $repo = $this->em->getRepository('Opticity\GestionBundle\Entity\LunetteType');
        foreach ($params as $item) {
            if (!isset($item['abbrev'])) {
                throw new \Exception('abbrev doit exister');
            }

            $type = $repo->findOneBy([
                'abbrev' => $item['abbrev']
            ]);

            if( empty($type) ) {
                $type = new LunetteType();
                $type->setAbbrev($item['abbrev']);
                $type->setType($item['type']);
            } else {
                $type->setType($item['type']);
            }

            if (!empty($type)) {
                $this->em->persist($type);
                $this->em->flush();
            }
        }
    }

    /**
     * Pour récuperer tous les types de produits
     * @return array
     */
    public function getTypeProduct() {
        $repo = $this->em->getRepository('OpticityGestionBundle:LunetteType');
        return $repo->findAllProduct();
    }

    /**
     * Inserer les genre de produits
     * @param $params
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     */
    public function putGenrePersProduit($params) {
        $repo = $this->em->getRepository('Opticity\GestionBundle\Entity\PersonGenre');
        foreach ($params as $item) {
            if (!isset($item['genre'])) {
                throw new \Exception('genre doit exister');
            }

            $genre = $repo->findOneBy([
                'genre' => $item['genre']
            ]);

            if( empty($genre) ) {
                $genre = new PersonGenre();
                $genre->setGenre($item['genre']);
                $genre->setLibelle($item['libelle']);
            } else {
                $genre->setLibelle($item['libelle']);
            }

            if (!empty($genre)) {
                $this->em->persist($genre);
                $this->em->flush();
            }
        }
    }

    /**
     * Recuperer les genres de produits
     */
    public function getGenrePersProduit() {
        $repo = $this->em->getRepository('OpticityGestionBundle:PersonGenre');
        return $repo->findAllGenre();
    }

    public function getProduit($code) {
        $repo = $this->em->getRepository('OpticityGestionBundle:Product');
        return $repo->findProduct($code);
    }

    public function putProduit($params) {
        $repo = $this->em->getRepository('Opticity\GestionBundle\Entity\Product');

        foreach ($params as $item) {
            if (!isset($item['code'])) {
                throw new \Exception('code doit exister');
            }
            if (!isset($item['title'])) {
                throw new \Exception('title doit exister');
            }
            if (!isset($item['description'])) {
                throw new \Exception('description doit exister');
            }
            if (!isset($item['qte_stock'])) {
                throw new \Exception('qte_stock doit exister');
            }
            if (!isset($item['marque'])) {
                throw new \Exception('marque doit exister');
            }
            if (!isset($item['price_ttc'])) {
                throw new \Exception('price_ttc doit exister');
            }
            if (!isset($item['type'])) {
                throw new \Exception('type doit exister');
            }
            if (!isset($item['genre'])) {
                throw new \Exception('genre doit exister');
            }

            $produit = $repo->findOneBy([
                'code' => $item['code']
            ]);

            $repoGenre = $this->em->getRepository('OpticityGestionBundle:PersonGenre');
            $genre = $repoGenre->findOneBy([
                'genre' => $item['genre']
            ]);

            if (empty($genre)) {
                throw new \Exception('Mandatory code genre');
            }

            $repoType = $this->em->getRepository('OpticityGestionBundle:LunetteType');
            $type = $repoType->findOneBy([
                'abbrev' => $item['type'],
            ]);
            if (empty($type)) {
                throw new \Exception('Mandatory code type');
            }

            $repoFournisseur = $this->em->getRepository('OpticityGestionBundle:Fournisseur');
            $marque = $repoFournisseur->findOneBy([
                'code' => $item['marque']
            ]);
            if (empty($marque)) {
                throw new \Exception('Mandatory code marque');
            }

            if( empty($produit) ) {

                $produit = new Product();
                $produit->setCode($item['code']);
                $produit->setDescription($item['description']);
                $produit->setMarque($marque);
                $produit->setPriceTtc($item['price_ttc']);
                $produit->setQteStock($item['qte_stock']);
                $produit->setTitle($item['title']);
                $produit->addGenre($genre);
                $produit->addType($type);

            } else {

                $produit->setTitle($item['title']);
                $produit->setDescription($item['description']);
                $produit->setMarque($marque);
                $produit->setPriceTtc($item['price_ttc']);
                $produit->setQteStock($item['qte_stock']);
                $produit->addGenre($genre);
                $produit->addType($type);
            }

            if (!empty($produit)) {
                $this->em->persist($produit);
                $this->em->flush();
            }
        }
    }

    public function deleteProduit($id) {
        $repo = $this->em->getRepository('Opticity\GestionBundle\Entity\Product');

        $produt = $repo->findOneBy([
            'id' => $id,
        ]);

        if (!empty($produt)) {
            $this->em->remove($produt);
            $this->em->flush();
        }
    }
}