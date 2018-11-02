<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CorteRepository")
 */
class Corte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $espesor;

    /**
     * @ORM\Column(type="integer")
     */
    private $vel_corte;

    /**
     * @ORM\Column(type="integer")
     */
    private $t_pinchazo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEspesor(): ?float
    {
        return $this->espesor;
    }

    public function setEspesor(float $espesor): self
    {
        $this->espesor = $espesor;

        return $this;
    }

    public function getVelCorte(): ?int
    {
        return $this->vel_corte;
    }

    public function setVelCorte(int $vel_corte): self
    {
        $this->vel_corte = $vel_corte;

        return $this;
    }

    public function getTPinchazo(): ?int
    {
        return $this->t_pinchazo;
    }

    public function setTPinchazo(int $t_pinchazo): self
    {
        $this->t_pinchazo = $t_pinchazo;

        return $this;
    }
}
