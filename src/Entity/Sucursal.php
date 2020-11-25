<?php

namespace App\Entity;

use App\Repository\SucursalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SucursalRepository::class)
 */
class Sucursal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	 /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Banco", inversedBy="sucursal")
     */
    private $banco;
	
	 /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cuenta", mappedBy="sucursal")
     */
    private $cuenta;
	
    /**
     * @ORM\Column(type="integer")
     */
    private $codigo_plaza;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkCodigoBancario(): ?int
    {
        return $this->fk_codigo_bancario;
    }

    public function setFkCodigoBancario(int $fk_codigo_bancario): self
    {
        $this->fk_codigo_bancario = $fk_codigo_bancario;

        return $this;
    }

    public function getCodigoPlaza(): ?int
    {
        return $this->codigo_plaza;
    }

    public function setCodigoPlaza(int $codigo_plaza): self
    {
        $this->codigo_plaza = $codigo_plaza;

        return $this;
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
}
