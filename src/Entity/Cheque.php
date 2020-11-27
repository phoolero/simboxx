<?php

namespace App\Entity;

use App\Repository\CuentaRepository;
use App\Repository\ChequeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChequeRepository::class)
 */
class Cheque
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	 /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cuenta", inversedBy="cheque")
     * @ORM\Column(type="integer")
     */
    private $cuenta;

    /**
     * @ORM\Column(type="integer")
     */
    private $serie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $MontoNumero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $MontoLetras;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $TarjadoOrden;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $TarjadoAlPortador;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $beneficiario;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $FirmaTitular;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $FirmaBeneficiarioAtravesada;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $cruzado;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CruzadoEspecialBanco;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NumeroDiasCheque;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NumeroDiasRevalidacion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $RevalidacionFirma;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $EndosoDepositoCuenta;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $EndosoDepositoFirma;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $EndosoDepositoRut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $EndosoRegularFirma;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $EndosoRegularRut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $EndosoRegularNombre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Error;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCuenta(): ?int
    {
        return $this->cuenta;
    }

    public function setCuenta(int $cuenta): self
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    public function getSerie(): ?int
    {
        return $this->serie;
    }

    public function setSerie(int $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getMontoNumero(): ?int
    {
        return $this->MontoNumero;
    }

    public function setMontoNumero(?int $MontoNumero): self
    {
        $this->MontoNumero = $MontoNumero;

        return $this;
    }

    public function getMontoLetras(): ?string
    {
        return $this->MontoLetras;
    }

    public function setMontoLetras(?string $MontoLetras): self
    {
        $this->MontoLetras = $MontoLetras;

        return $this;
    }

    public function getTarjadoOrden(): ?string
    {
        return $this->TarjadoOrden;
    }

    public function setTarjadoOrden(string $TarjadoOrden): self
    {
        $this->TarjadoOrden = $TarjadoOrden;

        return $this;
    }

    public function getTarjadoAlPortador(): ?string
    {
        return $this->TarjadoAlPortador;
    }

    public function setTarjadoAlPortador(string $TarjadoAlPortador): self
    {
        $this->TarjadoAlPortador = $TarjadoAlPortador;

        return $this;
    }

    public function getBeneficiario(): ?string
    {
        return $this->beneficiario;
    }

    public function setBeneficiario(?string $beneficiario): self
    {
        $this->beneficiario = $beneficiario;

        return $this;
    }

    public function getFirmaTitular(): ?string
    {
        return $this->FirmaTitular;
    }

    public function setFirmaTitular(?string $FirmaTitular): self
    {
        $this->FirmaTitular = $FirmaTitular;

        return $this;
    }

    public function getFirmaBeneficiarioAtravesada(): ?string
    {
        return $this->FirmaBeneficiarioAtravesada;
    }

    public function setFirmaBeneficiarioAtravesada(?string $FirmaBeneficiarioAtravesada): self
    {
        $this->FirmaBeneficiarioAtravesada = $FirmaBeneficiarioAtravesada;

        return $this;
    }

    public function getCruzado(): ?string
    {
        return $this->cruzado;
    }

    public function setCruzado(string $cruzado): self
    {
        $this->cruzado = $cruzado;

        return $this;
    }

    public function getCruzadoEspecialBanco(): ?string
    {
        return $this->CruzadoEspecialBanco;
    }

    public function setCruzadoEspecialBanco(?string $CruzadoEspecialBanco): self
    {
        $this->CruzadoEspecialBanco = $CruzadoEspecialBanco;

        return $this;
    }

    public function getNumeroDiasCheque(): ?int
    {
        return $this->NumeroDiasCheque;
    }

    public function setNumeroDiasCheque(?int $NumeroDiasCheque): self
    {
        $this->NumeroDiasCheque = $NumeroDiasCheque;

        return $this;
    }

    public function getNumeroDiasRevalidacion(): ?int
    {
        return $this->NumeroDiasRevalidacion;
    }

    public function setNumeroDiasRevalidacion(?int $NumeroDiasRevalidacion): self
    {
        $this->NumeroDiasRevalidacion = $NumeroDiasRevalidacion;

        return $this;
    }

    public function getRevalidacionFirma(): ?string
    {
        return $this->RevalidacionFirma;
    }

    public function setRevalidacionFirma(?string $RevalidacionFirma): self
    {
        $this->RevalidacionFirma = $RevalidacionFirma;

        return $this;
    }

    public function getEndosoDepositoCuenta(): ?string
    {
        return $this->EndosoDepositoCuenta;
    }

    public function setEndosoDepositoCuenta(?string $EndosoDepositoCuenta): self
    {
        $this->EndosoDepositoCuenta = $EndosoDepositoCuenta;

        return $this;
    }

    public function getEndosoDepositoFirma(): ?string
    {
        return $this->EndosoDepositoFirma;
    }

    public function setEndosoDepositoFirma(?string $EndosoDepositoFirma): self
    {
        $this->EndosoDepositoFirma = $EndosoDepositoFirma;

        return $this;
    }

    public function getEndosoDepositoRut(): ?string
    {
        return $this->EndosoDepositoRut;
    }

    public function setEndosoDepositoRut(?string $EndosoDepositoRut): self
    {
        $this->EndosoDepositoRut = $EndosoDepositoRut;

        return $this;
    }

    public function getEndosoRegularFirma(): ?string
    {
        return $this->EndosoRegularFirma;
    }

    public function setEndosoRegularFirma(?string $EndosoRegularFirma): self
    {
        $this->EndosoRegularFirma = $EndosoRegularFirma;

        return $this;
    }

    public function getEndosoRegularRut(): ?string
    {
        return $this->EndosoRegularRut;
    }

    public function setEndosoRegularRut(?string $EndosoRegularRut): self
    {
        $this->EndosoRegularRut = $EndosoRegularRut;

        return $this;
    }

    public function getEndosoRegularNombre(): ?string
    {
        return $this->EndosoRegularNombre;
    }

    public function setEndosoRegularNombre(?string $EndosoRegularNombre): self
    {
        $this->EndosoRegularNombre = $EndosoRegularNombre;

        return $this;
    }

    public function getError(): ?string
    {
        return $this->Error;
    }

    public function setError(?string $Error): self
    {
        $this->Error = $Error;

        return $this;
    }
}
