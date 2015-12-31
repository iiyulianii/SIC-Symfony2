<?php

namespace DeteccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conf_red
 *
 * @ORM\Table(name="conf_red")
 * @ORM\Entity(repositoryClass="DeteccionBundle\Repository\Conf_redRepository")
 */
class Conf_red
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
     * @ORM\Column(name="ip", type="string", length=255, nullable=true)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="ms", type="string", length=255, nullable=true)
     */
    private $ms;

    /**
     * @var string
     *
     * @ORM\Column(name="pe", type="string", length=255, nullable=true)
     */
    private $pe;

    /**
     * @var string
     *
     * @ORM\Column(name="dns1", type="string", length=255, nullable=true)
     */
    private $dns1;

    /**
     * @var string
     *
     * @ORM\Column(name="dns2", type="string", length=255, nullable=true)
     */
    private $dns2;

    /**
     * @var string
     *
     * @ORM\Column(name="mac", type="string", length=255)
     */
    private $mac;

    /**
     * @var string
     *
     * @ORM\Column(name="dhcp", type="string", length=50)
     */
    private $dhcp;

    /**
     * @ORM\OneToOne(targetEntity="Tred", inversedBy="conf_red")
     * @ORM\JoinColumn(name="tred_id", referencedColumnName="id")
     */
    private $tred;



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
     * @return Conf_red
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
     * Set ms
     *
     * @param string $ms
     *
     * @return Conf_red
     */
    public function setMs($ms)
    {
        $this->ms = $ms;

        return $this;
    }

    /**
     * Get ms
     *
     * @return string
     */
    public function getMs()
    {
        return $this->ms;
    }

    /**
     * Set pe
     *
     * @param string $pe
     *
     * @return Conf_red
     */
    public function setPe($pe)
    {
        $this->pe = $pe;

        return $this;
    }

    /**
     * Get pe
     *
     * @return string
     */
    public function getPe()
    {
        return $this->pe;
    }

    /**
     * Set dns1
     *
     * @param string $dns1
     *
     * @return Conf_red
     */
    public function setDns1($dns1)
    {
        $this->dns1 = $dns1;

        return $this;
    }

    /**
     * Get dns1
     *
     * @return string
     */
    public function getDns1()
    {
        return $this->dns1;
    }

    /**
     * Set dns2
     *
     * @param string $dns2
     *
     * @return Conf_red
     */
    public function setDns2($dns2)
    {
        $this->dns2 = $dns2;

        return $this;
    }

    /**
     * Get dns2
     *
     * @return string
     */
    public function getDns2()
    {
        return $this->dns2;
    }

    /**
     * Set mac
     *
     * @param string $mac
     *
     * @return Conf_red
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
    

     public function setDhcp($dhcp)
    {
        $this->dhcp = $dhcp;

        return $this;
    }

    public function getDhcp()
    {
        return $this->dhcp;
    }

    /**
     * Set tred
     *
     * @param \DeteccionBundle\Entity\Tred $tred
     *
     * @return Conf_red
     */
    public function setTred(\DeteccionBundle\Entity\Tred $tred = null)
    {
        $this->tred = $tred;

        return $this;
    }

    /**
     * Get tred
     *
     * @return \DeteccionBundle\Entity\Tred
     */
    public function getTred()
    {
        return $this->tred;
    }
}
