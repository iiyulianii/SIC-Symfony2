<?php

namespace DeteccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disco
 *
 * @ORM\Table(name="disco")
 * @ORM\Entity(repositoryClass="DeteccionBundle\Repository\DiscoRepository")
 */
class Disco
{
    public function __toString()
    {
        return $this->getNse();
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
     * @ORM\Column(name="nse", type="string", length=255)
     */
    private $nse;

    /**
     * @var string
     *
     * @ORM\Column(name="fab", type="string", length=255)
     */
    private $fab;


    /**
     * @var string
     *
     * @ORM\Column(name="cap", type="string", length=255)
     */
    private $cap;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=255, nullable=true)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="tip", type="string", length=255, nullable=true)
     */
    private $tip;

    /**
     * @ORM\ManyToOne(targetEntity="Cpu", inversedBy="discos")
     * @ORM\JoinColumn(name="cpu_id", referencedColumnName="id")
     */
    private $cpu;

    


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nse
     *
     * @param string $nse
     *
     * @return Disco
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
     * Set fab
     *
     * @param string $fab
     *
     * @return Disco
     */
    public function setFab($fab)
    {
        $this->fab = $fab;

        return $this;
    }

    /**
     * Get fab
     *
     * @return string
     */
    public function getFab()
    {
        return $this->fab;
    }

    /**
     * Set cap
     *
     * @param string $cap
     *
     * @return Disco
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
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Disco
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set tip
     *
     * @param string $tip
     *
     * @return Disco
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
     * @param \DeteccionBundle\Entity\Cpu $cpu
     *
     * @return Disco
     */
    public function setCpu(\DeteccionBundle\Entity\Cpu $cpu = null)
    {
        $this->cpu = $cpu;

        return $this;
    }

    /**
     * Get cpu
     *
     * @return \DeteccionBundle\Entity\Cpu
     */
    public function getCpu()
    {
        return $this->cpu;
    }
}
