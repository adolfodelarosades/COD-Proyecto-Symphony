<?php

namespace App\Entity;

use App\Repository\SuscripcionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuscripcionRepository::class)
 */
class Suscripcion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transaccion;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="suscripcions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    /**
     * @ORM\OneToOne(targetEntity=Precio::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $precio;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_creacion;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha_fin_suscripcion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTransaccion(): ?string
    {
        return $this->transaccion;
    }

    public function setTransaccion(string $transaccion): self
    {
        $this->transaccion = $transaccion;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getPrecio(): ?Precio
    {
        return $this->precio;
    }

    public function setPrecio(Precio $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fecha_creacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fecha_creacion): self
    {
        $this->fecha_creacion = $fecha_creacion;

        return $this;
    }

    public function getFechaFinSuscripcion(): ?\DateTimeInterface
    {
        return $this->fecha_fin_suscripcion;
    }

    public function setFechaFinSuscripcion(?\DateTimeInterface $fecha_fin_suscripcion): self
    {
        $this->fecha_fin_suscripcion = $fecha_fin_suscripcion;

        return $this;
    }
}
