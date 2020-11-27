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
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $deposito;

    public function getId(): ?int
    {
        return $this->id;
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
