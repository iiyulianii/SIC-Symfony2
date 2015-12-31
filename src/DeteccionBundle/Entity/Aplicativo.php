<?php

namespace DeteccionBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Aplicativo
 *
 * @ORM\Table(name="aplicativo")
 * @ORM\Entity(repositoryClass="DeteccionBundle\Repository\AplicativoRepository")
 */
class Aplicativo
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="ver", type="string", length=255)
     */
    private $ver;

    /**
     * @var string
     *
     * @ORM\Column(name="arq", type="string", length=255, nullable=true)
     */
    private $arq;

    /**
     * @ORM\ManyToMany(targetEntity="Cpu", mappedBy="aplicativos", cascade={"persist","remove"})
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
     * Set name
     *
     * @param string $name
     *
     * @return Aplicativo
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
     * Set ver
     *
     * @param string $ver
     *
     * @return Aplicativo
     */
    public function setVer($ver)
    {
        $this->ver = $ver;

        return $this;
    }

    /**
     * Get ver
     *
     * @return string
     */
    public function getVer()
    {
        return $this->ver;
    }

    /**
     * Set arq
     *
     * @param string $arq
     *
     * @return Aplicativo
     */
    public function setArq($arq)
    {
        $this->arq = $arq;

        return $this;
    }

    /**
     * Get arq
     *
     * @return string
     */
    public function getArq()
    {
        return $this->arq;
    }

    /**
     * Set cpus
     *
     * @param string $cpus
     *
     * @return Aplicativo
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
     * @return Aplicativo
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
