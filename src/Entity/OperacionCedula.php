<?php

namespace App\Entity;

use App\Repository\OperacionCedulaRepository;
use App\Repository\CedulaRepository;
use App\Repository\OperacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperacionCedulaRepository::class)
 */
class OperacionCedula
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\ManyToOne(targetEntity="App\Entity\Cedula", inversedBy="operacioncedula")
     */
    private $cedula;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="App\Entity\Operacion", inversedBy="operacioncedula")
     */
    private $operacion;

    public function getOperacion(): ?string
    {
        return $this->operacion;
    }

    public function setOperacion(string $operacion): self
    {
        $this->operacion = $operacion;

        return $this;
    }
    public function getCedula(): ?string
    {
        return $this->cedula;
    }

    public function setCedula(string $cedula): self
    {
        $this->cedula = $cedula;

        return $this;
    }
}
