<?php

namespace App\Entity;

use App\Repository\PlanRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanRepository::class)
 */
class Plan
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $tipo_plan;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_inicio;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio_fijado_usuario;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio_fijado_empresa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoPlan(): ?int
    {
        return $this->tipo_plan;
    }

    public function setTipoPlan(int $tipo_plan): self
    {
        $this->tipo_plan = $tipo_plan;

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fecha_inicio;
    }

    public function setFechaInicio(\DateTimeInterface $fecha_inicio): self
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    public function getPrecioFijadoUsuario(): ?int
    {
        return $this->precio_fijado_usuario;
    }

    public function setPrecioFijadoUsuario(int $precio_fijado_usuario): self
    {
        $this->precio_fijado_usuario = $precio_fijado_usuario;

        return $this;
    }

    public function getPrecioFijadoEmpresa(): ?int
    {
        return $this->precio_fijado_empresa;
    }

    public function setPrecioFijadoEmpresa(int $precio_fijado_empresa): self
    {
        $this->precio_fijado_empresa = $precio_fijado_empresa;

        return $this;
    }
}
