<?php

namespace DeteccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uoptica
 *
 * @ORM\Table(name="uoptica")
 * @ORM\Entity(repositoryClass="DeteccionBundle\Repository\UopticaRepository")
 */
class Uoptica
{
    public function __toString()
    {
        return $this->getMar();
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
     * @ORM\Column(name="mar", type="string", length=255, nullable=true)
     */
    private $mar;

    /**
     * @var string
     *
     * @ORM\Column(name="nse", type="string", length=255, nullable=true)
     */
    private $nse;

    /**
     * @var string
     *
     * @ORM\Column(name="let", type="string", length=2)
     */
    private $let;

    /**
     * @var \Cpu
     *
     * @ORM\ManyToOne(targetEntity="Cpu", inversedBy="uopticas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cpu_id", referencedColumnName="id")
     * })
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
     * Set mar
     *
     * @param string $mar
     *
     * @return Uoptica
     */
    public function setMar($mar)
    {
        $this->mar = $mar;

        return $this;
    }

    /**
     * Get mar
     *
     * @return string
     */
    public function getMar()
    {
        return $this->mar;
    }

    /**
     * Set nse
     *
     * @param string $nse
     *
     * @return Uoptica
     */
    public function setNse($nse)
    {
        $this->nse = $nse;

        return $this;
    }

    /**
     * Get nse
     *
     * @return string
     */
    public function getNse()
    {
        return $this->nse;
    }

    /**
     * Set cpu
     *
     * @param string $cpu
     *
     * @return Uoptica
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

    public function setLet($let)
    {
        $this->let = $let;

        return $this;
    }
    public function getLet()
    {
        return $this->let;
    }
}
