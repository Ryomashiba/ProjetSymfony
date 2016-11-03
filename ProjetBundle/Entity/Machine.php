<?php

namespace ProjetSymfony\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Machine
 *
 * @ORM\Table(name="machine")
 * @ORM\Entity(repositoryClass="ProjetSymfony\ProjetBundle\Repository\MachineRepository")
 */
class Machine
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
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=15)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="salle", type="int", length=50)
     */
    private $salle;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=50)
     */
    private $statut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;


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
     * Set ip
     *
     * @param string $ip
     *
     * @return Machine
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Machine
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set salle
     *
     * @param \int $salle
     *
     * @return Machine
     */
    public function setSalle(\int $salle)
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get salle
     *
     * @return \int
     */
    public function getSalle()
    {
        return $this->salle;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Machine
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Machine
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }
}

