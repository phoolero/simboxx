<?php

namespace App\Entity;

use App\Repository\CedulaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CedulaRepository::class)
 */
class Cedula
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string",length=10)
     */
    private $rut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ruta_imagen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRutaImagen(): ?string
    {
        return $this->ruta_imagen;
    }

    public function setRutaImagen(string $ruta_imagen): self
    {
        $this->ruta_imagen = $ruta_imagen;

        return $this;
    }
}
