<?php

namespace DeteccionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deteccion
 *
 * @ORM\Table(name="deteccion")
 * @ORM\Entity(repositoryClass="DeteccionBundle\Repository\DeteccionRepository")
 */
class Deteccion
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
     * @ORM\Column(name="seg1", type="string", length=255)
     */
    private $seg1;

    /**
     * @var string
     *
     * @ORM\Column(name="seg2", type="string", length=255)
     */
    private $seg2;

    /**
     * @var string
     *
     * @ORM\Column(name="seg3", type="string", length=255)
     */
    private $seg3;

    /**
     * @var string
     *
     * @ORM\Column(name="seg4", type="string", length=255)
     */
    private $seg4;

    /**
     * @var string
     *
     * @ORM\Column(name="seg5", type="string", length=255)
     */
    private $seg5;


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
     * Set seg1
     *
     * @param string $seg1
     *
     * @return Deteccion
     */
    public function setSeg1($seg1)
    {
        $this->seg1 = $seg1;

        return $this;
    }

    /**
     * Get seg1
     *
     * @return string
     */
    public function getSeg1()
    {
        return $this->seg1;
    }

    /**
     * Set seg2
     *
     * @param string $seg2
     *
     * @return Deteccion
     */
    public function setSeg2($seg2)
    {
        $this->seg2 = $seg2;

        return $this;
    }

    /**
     * Get seg2
     *
     * @return string
     */
    public function getSeg2()
    {
        return $this->seg2;
    }

    /**
     * Set seg3
     *
     * @param string $seg3
     *
     * @return Deteccion
     */
    public function setSeg3($seg3)
    {
        $this->seg3 = $seg3;

        return $this;
    }

    /**
     * Get seg3
     *
     * @return string
     */
    public function getSeg3()
    {
        return $this->seg3;
    }

    /**
     * Set seg4
     *
     * @param string $seg4
     *
     * @return Deteccion
     */
    public function setSeg4($seg4)
    {
        $this->seg4 = $seg4;

        return $this;
    }

    /**
     * Get seg4
     *
     * @return string
     */
    public function getSeg4()
    {
        return $this->seg4;
    }

    /**
     * Set seg5
     *
     * @param string $seg5
     *
     * @return Deteccion
     */
    public function setSeg5($seg5)
    {
        $this->seg5 = $seg5;

        return $this;
    }

    /**
     * Get seg5
     *
     * @return string
     */
    public function getSeg5()
    {
        return $this->seg5;
    }
}
