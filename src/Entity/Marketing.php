<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MarketingRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Marketing
{


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cantidad;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $horas;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dias;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $meses;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * @param $dias
     * @return Marketing
     */
    public function setCreated($date): self
    {
        $this->created = $date;

        return $this;
    }

    /**
     * @param $date
     * @return Marketing
     */
    public function setUpdated($date): self
    {
        $this->updated = $date;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string $type
     * @return Marketing
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(?float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(?int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getHoras(): ?int
    {
        return $this->horas;
    }

    public function setHoras(?int $horas): self
    {
        $this->horas = $horas;

        return $this;
    }

    public function getDias(): ?int
    {
        return $this->dias;
    }

    public function setDias(?int $dias): self
    {
        $this->dias = $dias;

        return $this;
    }

    public function getMeses(): ?int
    {
        return $this->meses;
    }

    public function setMeses(?int $meses): self
    {
        $this->meses = $meses;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

        return $this;
    }
//    eventos

    /**
     * @ORM\PrePersist
     */
    public function PrePersistEvent()
    {
        $this->type = strip_tags($this->type);
        $this->slug = str_replace(" ", "-", strip_tags(mb_strtolower(trim($this->type))));
        $this->updateItem();
    }

    /**
     * @ORM\PreUpdate
     */
    public function PostUpdateEvent()
    {
        $this->updateItem();
    }

    private function updateItem()
    {
        $this->total = $this->valor * $this->horas * $this->dias * $this->meses;
    }
}
