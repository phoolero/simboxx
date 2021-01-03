<?php

namespace App\Entity;

use App\Repository\TipoPlanRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipoPlanRepository::class)
 */
class TipoPlan
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
     * @ORM\Column(type="integer")
     */
    private $plazo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $precio_plan_usuario;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $precio_plan_empresa;

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

    public function getPlazo(): ?int
    {
        return $this->plazo;
    }

    public function setPlazo(int $plazo): self
    {
        $this->plazo = $plazo;

        return $this;
    }

    public function getPrecioPlanUsuario(): ?string
    {
        return $this->precio_plan_usuario;
    }

    public function setPrecioPlanUsuario(string $precio_plan_usuario): self
    {
        $this->precio_plan_usuario = $precio_plan_usuario;

        return $this;
    }

    public function getPrecioPlanEmpresa(): ?string
    {
        return $this->precio_plan_empresa;
    }

    public function setPrecioPlanEmpresa(string $precio_plan_empresa): self
    {
        $this->precio_plan_empresa = $precio_plan_empresa;

        return $this;
    }
}
