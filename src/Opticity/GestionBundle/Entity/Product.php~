<?php

namespace Opticity\GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="Opticity\GestionBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="code", type="string", length=9, nullable=false)
     */
    private $code;

    /**
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\Column(name="qte_stock", type="integer")
     */
    private $qte_stock;

    /**
     * @ORM\ManyToOne(targetEntity="Opticity\GestionBundle\Entity\Fournisseur", cascade={"persist"})
     */
    private $marque;

    /**
     * @ORM\Column(name="price_ttc", type="float", length=255)
     */
    private $price_ttc;

    /**
     * @ORM\OneToMany(targetEntity="Opticity\GestionBundle\Entity\LunetteType", mappedBy="LunetteType")
     * @JoinColumn(name="lunette_type_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="Opticity\GestionBundle\Entity\PersonGenre", mappedBy="PersonGenre")
     * @JoinColumn(name="pers_genre_id", referencedColumnName="id")
     */
    private $genre;


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
     * Set title
     *
     * @param string $title
     *
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
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
     * Set qteStock
     *
     * @param integer $qteStock
     *
     * @return Product
     */
    public function setQteStock($qteStock)
    {
        $this->qte_stock = $qteStock;

        return $this;
    }

    /**
     * Get qteStock
     *
     * @return integer
     */
    public function getQteStock()
    {
        return $this->qte_stock;
    }

    /**
     * Set priceTtc
     *
     * @param float $priceTtc
     *
     * @return Product
     */
    public function setPriceTtc($priceTtc)
    {
        $this->price_ttc = $priceTtc;

        return $this;
    }

    /**
     * Get priceTtc
     *
     * @return float
     */
    public function getPriceTtc()
    {
        return $this->price_ttc;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Product
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Product
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set marque
     *
     * @param \Opticity\GestionBundle\Entity\Fournisseur $marque
     *
     * @return Product
     */
    public function setMarque(\Opticity\GestionBundle\Entity\Fournisseur $marque = null)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return \Opticity\GestionBundle\Entity\Fournisseur
     */
    public function getMarque()
    {
        return $this->marque;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->type = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add type
     *
     * @param \Opticity\GestionBundle\Entity\LunetteType $type
     *
     * @return Product
     */
    public function addType(\Opticity\GestionBundle\Entity\LunetteType $type)
    {
        $this->type[] = $type;

        return $this;
    }

    /**
     * Remove type
     *
     * @param \Opticity\GestionBundle\Entity\LunetteType $type
     */
    public function removeType(\Opticity\GestionBundle\Entity\LunetteType $type)
    {
        $this->type->removeElement($type);
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Product
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
     * Add genre
     *
     * @param \Opticity\GestionBundle\Entity\PersonGenre $genre
     *
     * @return Product
     */
    public function addGenre(\Opticity\GestionBundle\Entity\PersonGenre $genre)
    {
        $this->genre[] = $genre;

        return $this;
    }

    /**
     * Remove genre
     *
     * @param \Opticity\GestionBundle\Entity\PersonGenre $genre
     */
    public function removeGenre(\Opticity\GestionBundle\Entity\PersonGenre $genre)
    {
        $this->genre->removeElement($genre);
    }
}
