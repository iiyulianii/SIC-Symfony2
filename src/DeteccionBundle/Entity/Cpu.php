<?php

namespace DeteccionBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cpu
 *
 * @ORM\Table(name="cpu")
 * @ORM\Entity(repositoryClass="DeteccionBundle\Repository\CpuRepository")
 */
class Cpu
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
     * @ORM\Column(name="nse", type="string", length=255)
     */
    private $nse;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="fab", type="string", length=255)
     */
    private $fab;

    /**
     * @var string
     *
     * @ORM\Column(name="sepro", type="string", length=255)
     */
    private $sepro;

    /**
     * @var string
     *
     * @ORM\Column(name="nopro", type="string", length=255)
     */
    private $nopro;

    /**
     * @var string
     *
     * @ORM\Column(name="nupro", type="string", length=255)
     */
    private $nupro;

    /**
     * @var string
     *
     * @ORM\Column(name="vepro", type="string", length=255)
     */
    private $vepro;

    /**
     * @var string
     *
     * @ORM\Column(name="lopro", type="string", length=255, nullable=true)
     */
    private $lopro;

    /**
     * @var string
     *
     * @ORM\Column(name="fapro", type="string", length=255, nullable=true)
     */
    private $fapro;

    /**
     * @var string
     *
     * @ORM\Column(name="arpro", type="string", length=255, nullable=true)
     */
    private $arpro;

    /// RELACIONANDO LAS TABLAS ///

    /**
     *
     * @ORM\ManyToOne(targetEntity="Rol", inversedBy="cpus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rol_id", referencedColumnName="id")
     * })
     */
    private $rol;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Seccion", inversedBy="cpus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="seccion_id", referencedColumnName="id")
     * })
     */
    private $seccion;

    /**
     * @ORM\OneToMany(targetEntity="Conf_sistema", mappedBy="cpu", cascade={"persist", "remove"})
     */
    private $conf_sistema;

    /**
     * @ORM\OneToMany(targetEntity="Uoptica", mappedBy="cpu", cascade={"persist", "remove"})
     */
    private $uopticas;

    /**
     * @ORM\OneToMany(targetEntity="Tred", mappedBy="cpu", cascade={"persist", "remove"})
     */
    private $tredes;

    /**
     * @ORM\OneToMany(targetEntity="Memoria", mappedBy="cpu", cascade={"persist", "remove"})
     */
    private $memorias;

    /**
     * @ORM\OneToMany(targetEntity="Disco", mappedBy="cpu", cascade={"persist", "remove"})
     */
    private $discos;

    /**
     * @ORM\ManyToMany(targetEntity="Aplicativo", inversedBy="cpus")
     * @ORM\JoinTable(name="cpus_aplicativos")
     */
    private $aplicativos;

    public function __construct()
    {
        $this->conf_sistema = new ArrayCollection();
        $this->aplicativos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->uopticas = new ArrayCollection();
        $this->tredes = new ArrayCollection();
        $this->memorias = new ArrayCollection();
        $this->discos = new ArrayCollection();
    }

    /// METODOS GET - SET ///
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
     * Set nse
     *
     * @param string $nse
     *
     * @return Cpu
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Cpu
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
     * Set fab
     *
     * @param string $fab
     *
     * @return Cpu
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
     * Set sepro
     *
     * @param string $sepro
     *
     * @return Cpu
     */
    public function setSepro($sepro)
    {
        $this->sepro = $sepro;

        return $this;
    }

    /**
     * Get sepro
     *
     * @return string
     */
    public function getSepro()
    {
        return $this->sepro;
    }

    /**
     * Set nopro
     *
     * @param string $nopro
     *
     * @return Cpu
     */
    public function setNopro($nopro)
    {
        $this->nopro = $nopro;

        return $this;
    }

    /**
     * Get nopro
     *
     * @return string
     */
    public function getNopro()
    {
        return $this->nopro;
    }

    /**
     * Set nupro
     *
     * @param string $nupro
     *
     * @return Cpu
     */
    public function setNupro($nupro)
    {
        $this->nupro = $nupro;

        return $this;
    }

    /**
     * Get nupro
     *
     * @return string
     */
    public function getNupro()
    {
        return $this->nupro;
    }

    /**
     * Set vepro
     *
     * @param string $vepro
     *
     * @return Cpu
     */
    public function setVepro($vepro)
    {
        $this->vepro = $vepro;

        return $this;
    }

    /**
     * Get vepro
     *
     * @return string
     */
    public function getVepro()
    {
        return $this->vepro;
    }

    /**
     * Set lopro
     *
     * @param string $lopro
     *
     * @return Cpu
     */
    public function setLopro($lopro)
    {
        $this->lopro = $lopro;

        return $this;
    }

    /**
     * Get lopro
     *
     * @return string
     */
    public function getLopro()
    {
        return $this->lopro;
    }

    /**
     * Set fapro
     *
     * @param string $fapro
     *
     * @return Cpu
     */
    public function setFapro($fapro)
    {
        $this->fapro = $fapro;

        return $this;
    }

    /**
     * Get fapro
     *
     * @return string
     */
    public function getFapro()
    {
        return $this->fapro;
    }

    /**
     * Set arpro
     *
     * @param string $arpro
     *
     * @return Cpu
     */
    public function setArpro($arpro)
    {
        $this->arpro = $arpro;

        return $this;
    }

    /**
     * Get arpro
     *
     * @return string
     */
    public function getArpro()
    {
        return $this->arpro;
    }

    /**
     * Set rol
     *
     * @param string $rol
     *
     * @return Cpu
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return string
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set seccion
     *
     * @param string $seccion
     *
     * @return Cpu
     */
    public function setSeccion($seccion)
    {
        $this->seccion = $seccion;

        return $this;
    }

    /**
     * Get seccion
     *
     * @return string
     */
    public function getSeccion()
    {
        return $this->seccion;
    }

    ///////////////////////////////
    // RELACION CPU -- UOPTICAS //
    /////////////////////////////
    public function setUopticas(\Doctrine\Common\Collections\Collection $uopticas)
    {
        $this->uopticas = $uopticas;
        foreach ($uopticas as $uo) {
            $uo->setCpu($this);
        }
    }
    public function removeUoptica(\DeteccionBundle\Entity\Uoptica $uoptica)
    {
        $this->uopticas->removeElement($uoptica);
    }

    public function getUopticas()
    {
        return $this->uopticas;
    }

    // RELACION CPU -- TRED //
    //////////////////////////
    public function setTredes(\Doctrine\Common\Collections\Collection $tredes)
    {
        $this->tredes = $tredes;
        foreach ($tredes as $tr) {
            $tr->setCpu($this);
        }
    }
    public function removeTrede(\DeteccionBundle\Entity\Tred $trede)
    {
        $this->tredes->removeElement($trede);
    }

    public function getTredes()
    {
        return $this->tredes;
    }

    // RELACION CPU -- RAM //
    //////////////////////////
    public function setMemorias(\Doctrine\Common\Collections\Collection $memorias)
    {
        $this->memorias = $memorias;
        foreach ($memorias as $memoria) {
            $memoria->setCpu($this);
        }
    }
    public function removeMemoria(\DeteccionBundle\Entity\Memoria $memoria)
    {
        $this->memorias->removeElement($memoria);
    }
    public function getMemorias()
    {
        return $this->memorias;
    }

    // RELACION CPU -- DISCO //
    //////////////////////////
    public function setDiscos(\Doctrine\Common\Collections\Collection $discos)
    {
        $this->discos = $discos;
        foreach ($discos as $disco) {
            $disco->setCpu($this);
        }
        //return $this;
    }
    public function getDiscos()
    {
        return $this->discos;
    }

    // RELACION CPU -- CONF_SISTEMA //
    //////////////////////////////////
    public function setConfSistema(\Doctrine\Common\Collections\Collection $conf_sistema)
    {
        $this->conf_sistema = $conf_sistema;
        foreach ($conf_sistema as $conf) {
            $conf->setCpu($this);
        }
    }
    public function removeConfSistema(\DeteccionBundle\Entity\Conf_sistema $confSistema)
    {
        $this->conf_sistema->removeElement($confSistema);
    }
    public function getConfSistema(){
        return $this->conf_sistema;
    }

    /**
     * Set aplicativos
     *
     * @param string $aplicativos
     *
     * @return Cpu
     */
    public function setAplicativos($aplicativos)
    {
        $this->aplicativos = $aplicativos;

        return $this;
    }

    /**
     * Get aplicativos
     *
     * @return string
     */
    public function getAplicativos()
    {
        return $this->aplicativos;
    }

    public function addAplicativo(\DeteccionBundle\Entity\Aplicativo $aplicativo)
    {
        $this->aplicativos[] = $aplicativo;

        return $this;
    }

    /**
     * Remove aplicativo
     *
     * @param \DeteccionBundle\Entity\Aplicativo $aplicativo
     */
    public function removeAplicativo(\DeteccionBundle\Entity\Aplicativo $aplicativo)
    {
        $this->aplicativos->removeElement($aplicativo);
    }
}
