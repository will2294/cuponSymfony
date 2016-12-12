<?php
// src/AppBundle/Entity/Ciudad.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Ciudad
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
    $this->nombre;

    return $this;
  }
  public function setSlug($slug)
  {
    $this->slug = $slug;

    return $this;
  }
  public function getSlug()
  {
    $this->slug;

    return $this;
  }

  public function __toString()
  {
    return $this->getNombre();
    
  }
}
