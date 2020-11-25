<?php

namespace App\Entity;

use App\Repository\CuentaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CuentaRepository::class)
 */
class Cuenta
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Sucursal", inversedBy="cuenta")
     */
    private $sucursal;

	 /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cheque", mappedBy="cuenta")
     */
    private $cheque;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firma;

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

    public function getRut(): ?string
    {
        return $this->rut;
    }

    public function setRut(string $rut): self
    {
        $this->rut = $rut;

        return $this;
    }

    public function getFirma(): ?string
    {
        return $this->firma;
    }

    public function setFirma(string $firma): self
    {
        $this->firma = $firma;

        return $this;
    }
}
