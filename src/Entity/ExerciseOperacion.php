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
}
