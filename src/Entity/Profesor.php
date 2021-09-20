<?php

namespace App\Entity;

use App\Repository\ProfesorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfesorRepository::class)
 */
class Profesor
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
    private $estilo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlFoto;

    /**
     * @ORM\OneToMany(targetEntity=Curso::class, mappedBy="profesor")
     */
    private $cursos;

    /**
     * @ORM\OneToMany(targetEntity=Paso::class, mappedBy="profesor")
     */
    private $pasos;

    public function __construct()
    {
        $this->cursos = new ArrayCollection();
        $this->pasos = new ArrayCollection();
    }

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

    public function getEstilo(): ?string
    {
        return $this->estilo;
    }

    public function setEstilo(string $estilo): self
    {
        $this->estilo = $estilo;

        return $this;
    }

    public function getUrlFoto(): ?string
    {
        return $this->urlFoto;
    }

    public function setUrlFoto(?string $urlFoto): self
    {
        $this->urlFoto = $urlFoto;

        return $this;
    }

    /**
     * @return Collection|Curso[]
     */
    public function getCursos(): Collection
    {
        return $this->cursos;
    }

    public function addCurso(Curso $curso): self
    {
        if (!$this->cursos->contains($curso)) {
            $this->cursos[] = $curso;
            $curso->setProfesor($this);
        }

        return $this;
    }

    public function removeCurso(Curso $curso): self
    {
        if ($this->cursos->removeElement($curso)) {
            // set the owning side to null (unless already changed)
            if ($curso->getProfesor() === $this) {
                $curso->setProfesor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Paso[]
     */
    public function getPasos(): Collection
    {
        return $this->pasos;
    }

    public function addPaso(Paso $paso): self
    {
        if (!$this->pasos->contains($paso)) {
            $this->pasos[] = $paso;
            $paso->setProfesor($this);
        }

        return $this;
    }

    public function removePaso(Paso $paso): self
    {
        if ($this->pasos->removeElement($paso)) {
            // set the owning side to null (unless already changed)
            if ($paso->getProfesor() === $this) {
                $paso->setProfesor(null);
            }
        }

        return $this;
    }
}
