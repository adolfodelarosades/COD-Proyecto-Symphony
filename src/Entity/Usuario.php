<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $passwort_reset_token;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $password_reset_expires_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $activation_token;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_active;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_admin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_suscrito;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_registro;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_fin_suscripcion;

    /**
     * @ORM\OneToMany(targetEntity=Suscripcion::class, mappedBy="usuario")
     */
    private $suscripcions;

    public function __construct()
    {
        $this->suscripcions = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPasswortResetToken(): ?string
    {
        return $this->passwort_reset_token;
    }

    public function setPasswortResetToken(string $passwort_reset_token): self
    {
        $this->passwort_reset_token = $passwort_reset_token;

        return $this;
    }

    public function getPasswordResetExpiresAt(): ?\DateTimeImmutable
    {
        return $this->password_reset_expires_at;
    }

    public function setPasswordResetExpiresAt(?\DateTimeImmutable $password_reset_expires_at): self
    {
        $this->password_reset_expires_at = $password_reset_expires_at;

        return $this;
    }

    public function getActivationToken(): ?string
    {
        return $this->activation_token;
    }

    public function setActivationToken(?string $activation_token): self
    {
        $this->activation_token = $activation_token;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

    public function getIsAdmin(): ?bool
    {
        return $this->is_admin;
    }

    public function setIsAdmin(bool $is_admin): self
    {
        $this->is_admin = $is_admin;

        return $this;
    }

    public function getIsSuscrito(): ?bool
    {
        return $this->is_suscrito;
    }

    public function setIsSuscrito(bool $is_suscrito): self
    {
        $this->is_suscrito = $is_suscrito;

        return $this;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fecha_registro;
    }

    public function setFechaRegistro(\DateTimeInterface $fecha_registro): self
    {
        $this->fecha_registro = $fecha_registro;

        return $this;
    }

    public function getFechaFinSuscripcion(): ?\DateTimeInterface
    {
        return $this->fecha_fin_suscripcion;
    }

    public function setFechaFinSuscripcion(\DateTimeInterface $fecha_fin_suscripcion): self
    {
        $this->fecha_fin_suscripcion = $fecha_fin_suscripcion;

        return $this;
    }

    /**
     * @return Collection|Suscripcion[]
     */
    public function getSuscripcions(): Collection
    {
        return $this->suscripcions;
    }

    public function addSuscripcion(Suscripcion $suscripcion): self
    {
        if (!$this->suscripcions->contains($suscripcion)) {
            $this->suscripcions[] = $suscripcion;
            $suscripcion->setUsuario($this);
        }

        return $this;
    }

    public function removeSuscripcion(Suscripcion $suscripcion): self
    {
        if ($this->suscripcions->removeElement($suscripcion)) {
            // set the owning side to null (unless already changed)
            if ($suscripcion->getUsuario() === $this) {
                $suscripcion->setUsuario(null);
            }
        }

        return $this;
    }
}
