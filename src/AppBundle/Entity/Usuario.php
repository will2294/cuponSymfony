<?php
/*
 * (c) Javier Eguiluz <javier.eguiluz@gmail.com>
 *
 * Este archivo pertenece a la aplicación de prueba Cupon.
 * El código fuente de la aplicación incluye un archivo llamado LICENSE
 * con toda la información sobre el copyright y la licencia.
 */
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
/**
 * AppBundle\Entity\Usuario.
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 * @UniqueEntity("email")
 * @Assert\Callback(callback={"esDniValido"})
 */
class Usuario implements UserInterface
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(name="nombre", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $nombre;
    /**
     * @ORM\Column(name="apellidos", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $apellidos;
    /**
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\Email()
     */
    private $email;
    /**
     * @Assert\NotBlank(groups={"registro"})
     * @Assert\Length(min = 6)
     */
    private $passwordEnClaro;
    /**
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;
    /**
     * @ORM\Column(name="direccion", type="text")
     * @Assert\NotBlank()
     */
    private $direccion;
    /**
     * @ORM\Column(name="permite_email", type="boolean")
     * @Assert\Type(type="bool")
     */
    private $permiteEmail;
    /**
     * @ORM\Column(name="fecha_alta", type="datetime")
     * @Assert\DateTime()
     */
    private $fechaAlta;
    /**
     * @ORM\Column(name="fecha_nacimiento", type="datetime")
     * @Assert\DateTime()
     */
    private $fechaNacimiento;
    /**
     * @ORM\Column(name="dni", type="string", length=9)
     */
    private $dni;
    /**
     * @ORM\Column(name="numero_tarjeta", type="string", length=20)
     * @Assert\CardScheme(schemes={"AMEX", "MAESTRO", "MASTERCARD", "VISA"})
     */
    private $numeroTarjeta;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ciudad", inversedBy="usuarios")
     * @Assert\Type("AppBundle\Entity\Ciudad")
     */
    private $ciudad;
    public function __construct()
    {
        $this->fechaAlta = new \DateTime();
        $this->permiteEmail = true;
    }
    public function __toString()
    {
        return $this->getNombre().' '.$this->getApellidos();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * @param string $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    /**
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }
    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param string $password
     */
    public function setPasswordEnClaro($password)
    {
        $this->passwordEnClaro = $password;
    }
    /**
     * @return string
     */
    public function getPasswordEnClaro()
    {
        return $this->passwordEnClaro;
    }
    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @param string $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    /**
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }
    /**
     * @param bool $permiteEmail
     */
    public function setPermiteEmail($permiteEmail)
    {
        $this->permiteEmail = $permiteEmail;
    }
    /**
     * @return bool
     */
    public function getPermiteEmail()
    {
        return $this->permiteEmail;
    }
    /**
     * @param \DateTime $fechaAlta
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;
    }
    /**
     * @return \DateTime
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }
    /**
     * @param \DateTime $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }
    /**
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }
    /**
     * @param string $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }
    /**
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }
    /**
     * @param string $numeroTarjeta
     */
    public function setNumeroTarjeta($numeroTarjeta)
    {
        $this->numeroTarjeta = $numeroTarjeta;
    }
    /**
     * @return string
     */
    public function getNumeroTarjeta()
    {
        return $this->numeroTarjeta;
    }
    /**
     * @param Ciudad $ciudad
     */
    public function setCiudad(Ciudad $ciudad)
    {
        $this->ciudad = $ciudad;
    }
    /**
     * @return Ciudad
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }
}
