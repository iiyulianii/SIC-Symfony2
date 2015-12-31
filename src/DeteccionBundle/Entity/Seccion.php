<?php

namespace DeteccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seccion
 *
 * @ORM\Table(name="seccion")
 * @ORM\Entity(repositoryClass="DeteccionBundle\Repository\SeccionRepository")
 */
class Seccion
{
    public function __toString()
    {
        return $this->getNom();
    }
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="des", type="string", length=255, nullable=true)
     */
    private $des;

    /**
     * @ORM\OneToMany(targetEntity="Cpu", mappedBy="seccion", cascade={"persist", "remove"})
     */
    private $cpus;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Seccion
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set des
     *
     * @param string $des
     *
     * @return Seccion
     */
    public function setDes($des)
    {
        $this->des = $des;

        return $this;
    }

    /**
     * Get des
     *
     * @return string
     */
    public function getDes()
    {
        return $this->des;
    }

    /**
     * Set cpus
     *
     * @param string $cpus
     *
     * @return Seccion
     */
    public function setCpus($cpus)
    {
        $this->cpus = $cpus;

        return $this;
    }

    /**
     * Get cpus
     *
     * @return string
     */
    public function getCpus()
    {
        return $this->cpus;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cpus = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cpus
     *
     * @param \DeteccionBundle\Entity\Cpu $cpus
     *
     * @return Seccion
     */
    public function addCpus(\DeteccionBundle\Entity\Cpu $cpus)
    {
        $this->cpus[] = $cpus;

        return $this;
    }

    /**
     * Remove cpus
     *
     * @param \DeteccionBundle\Entity\Cpu $cpus
     */
    public function removeCpus(\DeteccionBundle\Entity\Cpu $cpus)
    {
        $this->cpus->removeElement($cpus);
    }
}
