<?php

namespace App\Entity;

use App\Repository\DepositoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepositoRepository::class)
 */
class Deposito
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numero_dias_deposito;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tipo_deposito;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombre_titular;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombre_depositante;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numero_documentos;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numero_cuenta;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $total;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroDiasDeposito(): ?int
    {
        return $this->numero_dias_deposito;
    }

    public function setNumeroDiasDeposito(?int $numero_dias_deposito): self
    {
        $this->numero_dias_deposito = $numero_dias_deposito;

        return $this;
    }

    public function getTipoDeposito(): ?int
    {
        return $this->tipo_deposito;
    }

    public function setTipoDeposito(?int $tipo_deposito): self
    {
        $this->tipo_deposito = $tipo_deposito;

        return $this;
    }

    public function getNombreTitular(): ?string
    {
        return $this->nombre_titular;
    }

    public function setNombreTitular(?string $nombre_titular): self
    {
        $this->nombre_titular = $nombre_titular;

        return $this;
    }

    public function getNombreDepositante(): ?string
    {
        return $this->nombre_depositante;
    }

    public function setNombreDepositante(?string $nombre_depositante): self
    {
        $this->nombre_depositante = $nombre_depositante;

        return $this;
    }

    public function getNumeroDocumentos(): ?int
    {
        return $this->numero_documentos;
    }

    public function setNumeroDocumentos(?int $numero_documentos): self
    {
        $this->numero_documentos = $numero_documentos;

        return $this;
    }

    public function getNumeroCuenta(): ?int
    {
        return $this->numero_cuenta;
    }

    public function setNumeroCuenta(?int $numero_cuenta): self
    {
        $this->numero_cuenta = $numero_cuenta;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(?int $total): self
    {
        $this->total = $total;

        return $this;
    }
}
