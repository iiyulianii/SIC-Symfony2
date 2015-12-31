<?php

namespace DeteccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conf_sistema
 *
 * @ORM\Table(name="conf_sistema")
 * @ORM\Entity(repositoryClass="DeteccionBundle\Repository\Conf_sistemaRepository")
 */
class Conf_sistema
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
     * @ORM\Column(name="nso", type="string", length=255)
     */
    private $nso;

    /**
     * @var string
     *
     * @ORM\Column(name="vso", type="string", length=255)
     */
    private $vso;

    /**
     * @var string
     *
     * @ORM\Column(name="aso", type="string", length=255)
     */
    private $aso;

    /**
     * @ORM\ManyToOne(targetEntity="Cpu", inversedBy="conf_sistema")
     * @ORM\JoinColumn(name="cpu_id", referencedColumnName="id")
     */
    private $cpu;


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
     * Set nso
     *
     * @param string $nso
     *
     * @return Conf_sistema
     */
    public function setNso($nso)
    {
        $this->nso = $nso;

        return $this;
    }

    /**
     * Get nso
     *
     * @return string
     */
    public function getNso()
    {
        return $this->nso;
    }

    /**
     * Set vso
     *
     * @param string $vso
     *
     * @return Conf_sistema
     */
    public function setVso($vso)
    {
        $this->vso = $vso;

        return $this;
    }

    /**
     * Get vso
     *
     * @return string
     */
    public function getVso()
    {
        return $this->vso;
    }

    /**
     * Set aso
     *
     * @param string $aso
     *
     * @return Conf_sistema
     */
    public function setAso($aso)
    {
        $this->aso = $aso;

        return $this;
    }

    /**
     * Get aso
     *
     * @return string
     */
    public function getAso()
    {
        return $this->aso;
    }

    /**
     * Set cpu
     *
     * @param string $cpu
     *
     * @return Conf_sistema
     */
    public function setCpu($cpu)
    {
        $this->cpu = $cpu;

        return $this;
    }

    /**
     * Get cpu
     *
     * @return string
     */
    public function getCpu()
    {
        return $this->cpu;
    }
}
