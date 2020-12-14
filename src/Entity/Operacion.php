<?php

namespace App\Entity;

use App\Repository\OperacionRepository;
use App\Repository\TipoOperacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperacionRepository::class)
 */
class Operacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoOperacion", inversedBy="operacion")
     */
    private $tipo_operacion;

    /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */

    private $error_operacion;

    /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    private $mensaje_cliente;

    /**
     * @ORM\OneToMany(targetEntity=OperacionServicio::class, mappedBy="fk_operacion")
     */
    private $operacionServicios;

    public function __construct()
    {
        $this->operacionServicios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoOperacion(): ?int
    {
        return $this->tipo_operacion;
    }

    public function setTipoOperacion(int $tipo_operacion): self
    {
        $this->tipo_operacion = $tipo_operacion;

        return $this;
    }

    public function getMensajeCliente(): ?string
    {
        return $this->mensaje_cliente;
    }

    public function setMensajeCliente(?string $mensaje_cliente): self
    {
        $this->mensaje_cliente = $mensaje_cliente;

        return $this;
    }
    public function getErrorOperacion(): ?string
    {
        return $this->error_operacion;
    }

    public function setErrorOperacion(?string $error_operacion): self
    {
        $this->error_operacion = $error_operacion;

        return $this;
    }

    /**
     * @return Collection|OperacionServicio[]
     */
    public function getOperacionServicios(): Collection
    {
        return $this->operacionServicios;
    }

    public function addOperacionServicio(OperacionServicio $operacionServicio): self
    {
        if (!$this->operacionServicios->contains($operacionServicio)) {
            $this->operacionServicios[] = $operacionServicio;
            $operacionServicio->setFkOperacion($this);
        }

        return $this;
    }

    public function removeOperacionServicio(OperacionServicio $operacionServicio): self
    {
        if ($this->operacionServicios->removeElement($operacionServicio)) {
            // set the owning side to null (unless already changed)
            if ($operacionServicio->getFkOperacion() === $this) {
                $operacionServicio->setFkOperacion(null);
            }
        }

        return $this;
    }
}
