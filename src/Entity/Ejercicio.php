<?php

namespace App\Entity;

use App\Repository\EjercicioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EjercicioRepository::class)
 */
class Ejercicio
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
    private $alumno;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $puntos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activo;

    /**
     * @ORM\Column(type="string", length=1023)
     */
    private $cliente_dice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlumno(): ?string
    {
        return $this->alumno;
    }

    public function setAlumno(string $alumno): self
    {
        $this->alumno = $alumno;

        return $this;
    }

    public function getDocumento(): ?int
    {
        return $this->documento;
    }

    public function setDocumento(int $documento): self
    {
        $this->documento = $documento;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getPuntos(): ?int
    {
        return $this->puntos;
    }

    public function setPuntos(?int $puntos): self
    {
        $this->puntos = $puntos;

        return $this;
    }

    public function getActivo(): ?string
    {
        return $this->activo;
    }

    public function setActivo(string $activo): self
    {
        $this->activo = $activo;

        return $this;
    }
    public function getClienteDice(): ?string
    {
        return $this->cliente_dice;
    }

    public function setClienteDice(string $cliente_dice): self
    {
        $this->cliente_dice = $cliente_dice;

        return $this;
    }
}
