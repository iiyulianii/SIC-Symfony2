<?php

namespace DeteccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rol
 *
 * @ORM\Table(name="rol")
 * @ORM\Entity(repositoryClass="DeteccionBundle\Repository\RolRepository")
 */
class Rol
{
    public function __toString()
    {
        return $this->getDes();
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
     * @ORM\Column(name="des", type="string", length=255)
     */
    private $des;

    /**
     * @ORM\OneToMany(targetEntity="Cpu", mappedBy="rol", cascade={"persist", "remove"})
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
     * Set des
     *
     * @param string $des
     *
     * @return Rol
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
     * @return Rol
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
     * @return Rol
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
