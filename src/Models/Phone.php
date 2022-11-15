<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;
use Models\Locality;

/**
 * @ORM\Entity
 * @ORM\Table(name="telefono")
 */
class Phone
{
  /**
   * @ORM\Id
   * @ORM\Column(name="id", type="integer")
   * @ORM\GeneratedValue(strategy="IDENTITY")
   */
  private int|null $id = null;

  /**
   * @ORM\Column(name="nombre", type="string", length=30)
   */
  private string $nombre;

  /**
   * @ORM\Column(name="numero", type="string", length=30)
   */
  private string $numero;

  /**
   * @ORM\ManyToOne(targetEntity="Locality", inversedBy="telefonos", cascade={"persist"})
   * @ORM\JoinColumn(name="localidad_id", referencedColumnName="id")
   */
  private Locality|null $cliente = null;

  public function getId(): int|null
  {
    return $this->id;
  }

  public function setId(int|null $id): self
  {
    $this->id = $id;

    return $this;
  }

  public function getNombre(): string
  {
    return $this->nombre;
  }

  public function setNombre(string $nombre): self
  {
    $this->nombre = $nombre;

    return $this;
  }

  public function getNumero(): string
  {
    return $this->numero;
  }

  public function setNumero(string $numero): self
  {
    $this->numero = $numero;

    return $this;
  }

  public function getCliente(): Locality|null
  {
    return $this->cliente;
  }

  public function setCliente(Locality|null $cliente): self
  {
    $this->cliente = $cliente;

    return $this;
  }
}
