<?php

namespace Opticity\GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonGenre
 *
 * @ORM\Table(name="person_genre")
 * @ORM\Entity(repositoryClass="Opticity\GestionBundle\Repository\PersonGenreRepository")
 */
class PersonGenre
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
     * @ORM\Column(name="genre", type="string", length=5, nullable=false)
     */
    private $genre;

    /**
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

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
     * Set genre
     *
     * @param string $genre
     *
     * @return PersonGenre
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return PersonGenre
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
}
