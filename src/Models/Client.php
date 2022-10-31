<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cliente")
 */
class Client
{
  /**
   * @ORM\Id
   * @ORM\Column(name="id", type="integer")
   * @ORM\GeneratedValue(strategy="IDENTITY")
   */
  private int|null $id = null;

  /**
   * @ORM\Column(name="nombre", type="string", length=255)
   */
  private string $nombre;

  /**
   * @ORM\Column(name="apellido", type="string", length=255)
   */
  private string $apellido;

  /**
   * @ORM\Column(name="email", type="string", length=255)
   */
  private string $email;

  /**
   * @ORM\Column(name="razon_social", type="string", length=255)
   */
  private string $razonSocial;

  /**
   * @ORM\Column(name="telefono", type="string", length=255)
   */
  private string $telefono;

  /**
   * @ORM\Column(name="cuilcuit", type="string", length=255, unique=true)
   */
  private string $cuilcuit;

  public function getId(): int
  {
    return $this->id;
  }

  public function getNombre(): string
  {
    return $this->nombre;
  }

  public function getApellido(): string
  {
    return $this->apellido;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function getRazonSocial(): string
  {
    return $this->razonSocial;
  }

  public function getTelefono(): string
  {
    return $this->telefono;
  }

  public function getCuilCuit(): string
  {
    return $this->cuilcuit;
  }

  public function setNombre(string $nombre)
  {
    $this->nombre = $nombre;
  }

  public function setApellido(string $apellido)
  {
    $this->apellido = $apellido;
  }

  public function setEmail(string $email)
  {
    $this->email = $email;
  }

  public function setRazonSocial(string $razonSocial)
  {
    $this->razonSocial = $razonSocial;
  }

  public function setTelefono(string $telefono)
  {
    $this->telefono = $telefono;
  }

  public function setCuilCuit(string $cuilcuit)
  {
    $this->cuilcuit = $cuilcuit;
  }
}
