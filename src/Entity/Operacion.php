<?php

namespace App\Entity;

use App\Repository\OperacionRepository;
use App\Repository\TipoOperacionRepository;
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
    private $mensaje_cliente;

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
}
