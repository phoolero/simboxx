<?php

namespace App\Entity;

use App\Repository\PuntajeIntentoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PuntajeIntentoRepository::class)
 */
class PuntajeIntento
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
    private $alumno;

    /**
     * @ORM\Column(type="integer")
     */
    private $puntaje;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Timestamp;

    /**
     * @ORM\Column(type="integer")
     */
    private $intento;

    /**
     * @ORM\Column(type="integer")
     */
    private $operacion;


    public function __construct()
    {
        $this->operacion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlumno(): ?int
    {
        return $this->alumno;
    }

    public function setAlumno(int $alumno): self
    {
        $this->alumno = $alumno;

        return $this;
    }

 
    public function getPuntaje(): ?int
    {
        return $this->puntaje;
    }

    public function setPuntaje(int $puntaje): self
    {
        $this->puntaje = $puntaje;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->Timestamp;
    }

    public function setTimestamp(\DateTimeInterface $Timestamp): self
    {
        $this->Timestamp = $Timestamp;

        return $this;
    }

    public function getIntento(): ?int
    {
        return $this->intento;
    }

    public function setIntento(int $intento): self
    {
        $this->intento = $intento;

        return $this;
    }

    public function getOperacion(): ?int
    {
        return $this->operacion;
    }

    public function setOperacion(int $operacion): self
    {
        $this->operacion = $operacion;

        return $this;
    }
}
