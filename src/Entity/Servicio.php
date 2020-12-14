<?php

namespace App\Entity;

use App\Repository\ServicioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServicioRepository::class)
 */
class Servicio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=tipoServicio::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $fk_tipo_servicio;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_cliente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre_cliente;

    /**
     * @ORM\Column(type="integer")
     */
    private $total;

    /**
     * @ORM\Column(type="integer")
     */
    private $dias_servicio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkTipoServicio(): ?tipoServicio
    {
        return $this->fk_tipo_servicio;
    }

    public function setFkTipoServicio(?tipoServicio $fk_tipo_servicio): self
    {
        $this->fk_tipo_servicio = $fk_tipo_servicio;

        return $this;
    }

    public function getNumeroCliente(): ?int
    {
        return $this->numero_cliente;
    }

    public function setNumeroCliente(int $numero_cliente): self
    {
        $this->numero_cliente = $numero_cliente;

        return $this;
    }

    public function getNombreCliente(): ?string
    {
        return $this->nombre_cliente;
    }

    public function setNombreCliente(string $nombre_cliente): self
    {
        $this->nombre_cliente = $nombre_cliente;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getDiasServicio(): ?int
    {
        return $this->dias_servicio;
    }

    public function setDiasServicio(int $dias_servicio): self
    {
        $this->dias_servicio = $dias_servicio;

        return $this;
    }
}
