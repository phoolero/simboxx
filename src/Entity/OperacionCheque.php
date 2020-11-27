<?php

namespace App\Entity;

use App\Repository\OperacionChequeRepository;
use App\Repository\ChequeRepository;
use App\Repository\OperacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperacionChequeRepository::class)
 */
class OperacionCheque
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="App\Entity\Operacion", inversedBy="operacion")
     */
    private $operacion;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="App\Entity\Cheque", inversedBy="cheque")
     */
    private $cheque;

    public function getOperacion(): ?int
    {
        return $this->operacion;
    }

    public function setOperacion(int $operacion): self
    {
        $this->operacion = $operacion;

        return $this;
    }

    public function getCheque(): ?int
    {
        return $this->cheque;
    }

    public function setCheque(int $cheque): self
    {
        $this->cheque = $cheque;

        return $this;
    }
}
