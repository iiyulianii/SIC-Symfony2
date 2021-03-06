<?php

namespace DeteccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tred
 *
 * @ORM\Table(name="tred")
 * @ORM\Entity(repositoryClass="DeteccionBundle\Repository\TredRepository")
 */
class Tred
{
    public function __toString()
    {
        return $this->getNco();
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
     * @ORM\Column(name="mac", type="string", length=255)
     */
    private $mac;

    /**
     * @var string
     *
     * @ORM\Column(name="nco", type="string", length=255)
     */
    private $nco;

    /**
     * @ORM\ManyToOne(targetEntity="Cpu", inversedBy="tredes")
     * @ORM\JoinColumn(name="cpu_id", referencedColumnName="id")
     */
    private $cpu;

    /**
     * @ORM\OneToOne(targetEntity="Conf_red", mappedBy="tred", cascade={"persist", "remove"})
     *
     */
    private $conf_red;


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
     * @return Tred
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
     * Set mac
     *
     * @param string $mac
     *
     * @return Tred
     */
    public function setMac($mac)
    {
        $this->mac = $mac;

        return $this;
    }

    /**
     * Get mac
     *
     * @return string
     */
    public function getMac()
    {
        return $this->mac;
    }

    /**
     * Set nco
     *
     * @param string $nco
     *
     * @return Tred
     */
    public function setNco($nco)
    {
        $this->nco = $nco;

        return $this;
    }

    /**
     * Get nco
     *
     * @return string
     */
    public function getNco()
    {
        return $this->nco;
    }

    /**
     * Set cpu
     *
     * @param string $cpu
     *
     * @return Tred
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

    /**
     * Set confRed
     *
     * @param \DeteccionBundle\Entity\Conf_red $confRed
     *
     * @return Tred
     */
    public function setConfRed(\DeteccionBundle\Entity\Conf_red $confRed = null)
    {
        $this->conf_red = $confRed;

        return $this;
    }

    /**
     * Get confRed
     *
     * @return \DeteccionBundle\Entity\Conf_red
     */
    public function getConfRed()
    {
        return $this->conf_red;
    }
}
