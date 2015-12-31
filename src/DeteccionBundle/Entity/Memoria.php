<?php

namespace DeteccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Memoria
 *
 * @ORM\Table(name="memoria")
 * @ORM\Entity(repositoryClass="DeteccionBundle\Repository\MemoriaRepository")
 */
class Memoria
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
     * @ORM\Column(name="ser", type="string", length=255)
     */
    private $ser;

    /**
     * @var string
     *
     * @ORM\Column(name="mar", type="string", length=255)
     */
    private $mar;

    /**
     * @var string
     *
     * @ORM\Column(name="cap", type="string", length=255)
     */
    private $cap;

    /**
     * @var string
     *
     * @ORM\Column(name="vel", type="string", length=255)
     */
    private $vel;

    /**
     * @var string
     *
     * @ORM\Column(name="tip", type="string", length=255, nullable=true)
     */
    private $tip;

    /**
     * @ORM\ManyToOne(targetEntity="Cpu", inversedBy="memorias")
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
     * Set ser
     *
     * @param string $ser
     *
     * @return Memoria
     */
    public function setSer($ser)
    {
        $this->ser = $ser;

        return $this;
    }

    /**
     * Get ser
     *
     * @return string
     */
    public function getSer()
    {
        return $this->ser;
    }

    /**
     * Set mar
     *
     * @param string $mar
     *
     * @return Memoria
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
     * Set cap
     *
     * @param string $cap
     *
     * @return Memoria
     */
    public function setCap($cap)
    {
        $this->cap = $cap;

        return $this;
    }

    /**
     * Get cap
     *
     * @return string
     */
    public function getCap()
    {
        return $this->cap;
    }

    /**
     * Set vel
     *
     * @param string $vel
     *
     * @return Memoria
     */
    public function setVel($vel)
    {
        $this->vel = $vel;

        return $this;
    }

    /**
     * Get vel
     *
     * @return string
     */
    public function getVel()
    {
        return $this->vel;
    }

    /**
     * Set tip
     *
     * @param string $tip
     *
     * @return Memoria
     */
    public function setTip($tip)
    {
        $this->tip = $tip;

        return $this;
    }

    /**
     * Get tip
     *
     * @return string
     */
    public function getTip()
    {
        return $this->tip;
    }

    /**
     * Set cpu
     *
     * @param string $cpu
     *
     * @return Memoria
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
