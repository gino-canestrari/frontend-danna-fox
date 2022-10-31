<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="localidad")
 */
class Locality
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
   * @ORM\Column(name="codigo_area", type="string", length=4)
   */
  private string $codigoArea;

  public function getId(): int|null
  {
    return $this->id;
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

  public function getCodigoArea(): string
  {
    return $this->codigoArea;
  }

  public function setCodigoArea(string $codigoArea): self
  {
    $this->codigoArea = $codigoArea;

    return $this;
  }
}
