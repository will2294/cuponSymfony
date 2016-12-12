<?php
// src/AppBundle/Entity/Oferta.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Oferta
{
  /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    */
    protected $id;

    /** @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ciudad") */
    private $ciudad;

    /** @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tienda") */
    private $tienda;

    public function setCiudad(\AppBundle\Entity\Ciudad $ciudad)
    {
      $this->ciudad = $ciudad;
    }
    public function getCiudad()
    {
      return $this->ciudad;
    }
    public function setTienda(\AppBundle\Entity\Tienda $tienda)
    {
      $this->tienda = $tienda;
    }
    public function getTienda()
    {
      return $this->tienda;
    }
    public function __toString()
    {
    return $this->getNombre();
    }


}
