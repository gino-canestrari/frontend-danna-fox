<?php

namespace Models;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Models\Client;
use Models\Locality;

/**
 * @ORM\Entity
 * @ORM\Table(name="campania")
 */
class Campaign
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
   * @ORM\Column(name="texto", type="string", length=160)
   */
  private string $texto;

  /**
   * @ORM\Column(name="estado", type="string", nullable=true, options={"default": "CREADA"})
   */
  private string $estado;

  /**
   * @ORM\Column(name="cantidad_mensajes", type="string")
   */
  private string $cantidadMensajes;

  /**
   * @ORM\Column(name="fecha_inicio", type="date", insertable=false, options={"default": "CURRENT_DATE"})
   */
  private DateTime|null $fechaInicio = null;

  /**
   * One Campaign has One Client.
   * @ORM\OneToOne(targetEntity="Client", cascade={"persist"})
   * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
   */
  private Client|null $cliente = null;

  /**
   * Many Campaigns have Many Locality.
   * 
   * @ORM\ManyToMany(targetEntity="Locality")
   * @ORM\JoinTable(name="campania_por_localidad",
   *   joinColumns={@ORM\JoinColumn(name="campania_id", referencedColumnName="id")},
   *   inverseJoinColumns={@ORM\JoinColumn(name="localidad_id", referencedColumnName="id")}
   * )
   * @var Collection<int, Locality>
   */
  private Collection $localidades;

  public function __construct()
  {
    $this->localidades = new ArrayCollection();
  }

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

  public function getTexto(): string
  {
    return $this->texto;
  }

  public function setTexto(string $texto): self
  {
    $this->texto = $texto;

    return $this;
  }

  public function getEstado(): string
  {
    return $this->estado;
  }

  public function setEstado(string $estado): self
  {
    $this->estado = $estado;

    return $this;
  }

  public function getCantidadMensajes(): string
  {
    return $this->cantidadMensajes;
  }

  public function setCantidadMensajes(string $cantidadMensajes): self
  {
    $this->cantidadMensajes = $cantidadMensajes;

    return $this;
  }

  public function getFechaInicio(): DateTime
  {
    return $this->fechaInicio;
  }

  public function getFormattedFechaInicio(): string
  {
    return strtoupper(date_format($this->fechaInicio, 'j M o'));
  }

  public function setFechaInicio(DateTime $fechaInicio): self
  {
    $this->fechaInicio = $fechaInicio;

    return $this;
  }

  public function getCliente(): Client|null
  {
    return $this->cliente;
  }

  public function setCliente(Client|null $cliente): self
  {
    $this->cliente = $cliente;

    return $this;
  }

  public function getLocalidades(): Collection
  {
    return $this->localidades;
  }

  public function setLocalidades(Collection $localidades): self
  {
    $this->localidades = $localidades;

    return $this;
  }
}
