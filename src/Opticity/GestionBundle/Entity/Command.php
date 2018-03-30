<?php

namespace Opticity\GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Command
 *
 * @ORM\Table(name="command")
 * @ORM\Entity(repositoryClass="Opticity\GestionBundle\Repository\CommandRepository")
 */
class Command
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="code", type="string", length=30, nullable=false, unique=true)
     */
    private $code;

    /**
     * @ORM\ManyToMany(targetEntity="Opticity\GestionBundle\Entity\Client")
     * @ORM\JoinTable(name="bind_client_command")
     */
    private $client;

    /**
     * @ORM\ManyToMany(targetEntity="Opticity\GestionBundle\Entity\Product")
     * @ORM\JoinTable(name="bind_produit_command")
     */
    private $produit;

    /**
     * @ORM\Column(name="prix_unitaire", type="float", nullable=true)
     */
    private $prixUnitaire;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->client = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Command
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set command
     *
     * @param string $command
     *
     * @return Command
     */
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Get command
     *
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Get client
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set prixUnitaire
     *
     * @param float $prixUnitaire
     *
     * @return Command
     */
    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    /**
     * Get prixUnitaire
     *
     * @return float
     */
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * Set prixTotal
     *
     * @param float $prixTotal
     *
     * @return Command
     */
    public function setPrixTotal($prixTotal)
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    /**
     * Get prixTotal
     *
     * @return float
     */
    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Command
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add client
     *
     * @param \Opticity\GestionBundle\Entity\Client $client
     *
     * @return Command
     */
    public function addClient(\Opticity\GestionBundle\Entity\Client $client)
    {
        $this->client[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \Opticity\GestionBundle\Entity\Client $client
     */
    public function removeClient(\Opticity\GestionBundle\Entity\Client $client)
    {
        $this->client->removeElement($client);
    }

    /**
     * Add produit
     *
     * @param \Opticity\GestionBundle\Entity\Product $produit
     *
     * @return Command
     */
    public function addProduit(\Opticity\GestionBundle\Entity\Product $produit)
    {
        $this->produit[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \Opticity\GestionBundle\Entity\Product $produit
     */
    public function removeProduit(\Opticity\GestionBundle\Entity\Product $produit)
    {
        $this->produit->removeElement($produit);
    }

    /**
     * Get produit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduit()
    {
        return $this->produit;
    }
}
