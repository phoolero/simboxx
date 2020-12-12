<?php

namespace App\Entity;

use App\Repository\OperacionServicioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperacionServicioRepository::class)
 */
class OperacionServicio
{
    /**
     * @ORM\Id
     * @ORM\OneToOne(targetEntity=Servicio::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $fk_servicio;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Operacion::class, inversedBy="operacionServicios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fk_operacion;

    public function getFkServicio(): ?Servicio
    {
        return $this->fk_servicio;
    }

    public function setFkServicio(Servicio $fk_servicio): self
    {
        $this->fk_servicio = $fk_servicio;

        return $this;
    }

    public function getFkOperacion(): ?Operacion
    {
        return $this->fk_operacion;
    }

    public function setFkOperacion(?Operacion $fk_operacion): self
    {
        $this->fk_operacion = $fk_operacion;

        return $this;
    }
}
