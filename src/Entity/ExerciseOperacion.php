<?php

namespace App\Entity;

use App\Repository\EjercicioOperacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EjercicioOperacionRepository::class)
 */
class EjercicioOperacion
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\ManyToMany(targetEntity="App\Entity\Ejercicio", inversedBy="ejercicio")
     * 
     */
    private $Ejercicio;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\ManyToMany(targetEntity="App\Entity\Operacion", inversedBy="operacion")
     */
    private $operacion;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tutorial;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visible;

    public function getEjercicio(): ?int
    {
        return $this->ejercicio;
    }

    public function setEjercicio(int $ejercicio): self
    {
        $this->ejercicio = $ejercicio;

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

    public function getTutorial(): ?text
    {
        return $this->tutorial;
    }

    public function setTutorial(?text $tutorial): self
    {
        $this->tutorial = $tutorial;

        return $this;
    }

    public function getVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;

        return $this;
    }
}
