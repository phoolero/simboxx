<?php

namespace App\Entity;

use App\Repository\OperacionDepositoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperacionDepositoRepository::class)
 */
class OperacionDeposito
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $operacion;

    /**
     * @ORM\Column(type="integer")
     */
    private $deposito;

    public function getOperacion(): ?int
    {
        return $this->id;
    }
    public function setOperacion(int $operacion): self
    {
        $this->operacion = $operacion;

        return $this;
    }

    public function getDeposito(): ?int
    {
        return $this->deposito;
    }

    public function setDeposito(int $deposito): self
    {
        $this->deposito = $deposito;

        return $this;
    }
}
