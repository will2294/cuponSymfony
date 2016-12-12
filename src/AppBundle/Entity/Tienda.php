<?php
// src/AppBundle/Entity/Tienda.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Tienda
{
  /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    */
    protected $id;

    /** @ORM\Column(type="string", length=100) */
    protected $nombre;

    /** @ORM\Column(type="string", length=100) */
    protected $slug;

    /** @ORM\Column(type="string", length=10) */
    protected $login;

    /** @ORM\Column(type="string") */
    protected $password;

    /** @ORM\Column(type="text") */
    protected $descripcion;

    /** @ORM\Column(type="text") */
    protected $direccion;

    /** @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ciudad") */
    protected $ciudad;

    public function getId()
    {
      return $this->id;
    }

    public function setNombre($nombre)
    {
      $this->nombre = $nombre;
      return $this;
    }

    public function getNombre()
    {
      return $this->nombre;
    }

    public function setCiudad(\AppBundle\Entity\Ciudad $ciudad)
    {
      $this->ciudad = $ciudad;

      return $this;
    }

    public function getCiudad()
    {
      return $this->ciudad;
    }

    public function __toString()
    {
      return $this->getNombre();
    }

}
