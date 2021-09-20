<?php

namespace App\Entity;

use App\Repository\PasoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PasoRepository::class)
 */
class Paso
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlFoto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlVideo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $gratis;

    /**
     * @ORM\Column(type="boolean")
     */
    private $nuevo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duracion;

    /**
     * @ORM\ManyToOne(targetEntity=Profesor::class, inversedBy="pasos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $profesor;

    /**
     * @ORM\OneToOne(targetEntity=Nivel::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $nivel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getUrlFoto(): ?string
    {
        return $this->urlFoto;
    }

    public function setUrlFoto(string $urlFoto): self
    {
        $this->urlFoto = $urlFoto;

        return $this;
    }

    public function getUrlVideo(): ?string
    {
        return $this->urlVideo;
    }

    public function setUrlVideo(string $urlVideo): self
    {
        $this->urlVideo = $urlVideo;

        return $this;
    }

    public function getGratis(): ?bool
    {
        return $this->gratis;
    }

    public function setGratis(bool $gratis): self
    {
        $this->gratis = $gratis;

        return $this;
    }

    public function getNuevo(): ?bool
    {
        return $this->nuevo;
    }

    public function setNuevo(bool $nuevo): self
    {
        $this->nuevo = $nuevo;

        return $this;
    }

    public function getDuracion(): ?string
    {
        return $this->duracion;
    }

    public function setDuracion(string $duracion): self
    {
        $this->duracion = $duracion;

        return $this;
    }

    public function getProfesor(): ?Profesor
    {
        return $this->profesor;
    }

    public function setProfesor(?Profesor $profesor): self
    {
        $this->profesor = $profesor;

        return $this;
    }

    public function getNivel(): ?Nivel
    {
        return $this->nivel;
    }

    public function setNivel(Nivel $nivel): self
    {
        $this->nivel = $nivel;

        return $this;
    }
}
