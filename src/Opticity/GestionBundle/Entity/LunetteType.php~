<?php

namespace Opticity\GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LunetteType
 *
 * @ORM\Table(name="lunette_type")
 * @ORM\Entity(repositoryClass="Opticity\GestionBundle\Repository\LunetteTypeRepository")
 */
class LunetteType
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
     * @ORM\Column(name="abbrev", type="string", length=255, nullable=false, unique=true)
     */
    private $abbrev;

    /**
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;


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
     * Set abbrev
     *
     * @param string $abbrev
     *
     * @return LunetteType
     */
    public function setAbbrev($abbrev)
    {
        $this->abbrev = $abbrev;

        return $this;
    }

    /**
     * Get abbrev
     *
     * @return string
     */
    public function getAbbrev()
    {
        return $this->abbrev;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return LunetteType
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
}
