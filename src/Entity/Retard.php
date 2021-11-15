<?php

namespace App\Entity;

use App\Repository\RetardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RetardRepository::class)
 */
class Retard
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\ManyToOne(targetEntity=TypeRetard::class, inversedBy="lesRetards")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Mouvement::class, inversedBy="lesRetards")
     */
    private $leMouvement;

    /**
     * @ORM\Column(type="boolean")
     */
    private $impliqueAeroport;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getType(): ?TypeRetard
    {
        return $this->type;
    }

    public function setType(?TypeRetard $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getLeMouvement(): ?Mouvement
    {
        return $this->leMouvement;
    }

    public function setLeMouvement(?Mouvement $leMouvement): self
    {
        $this->leMouvement = $leMouvement;

        return $this;
    }

    public function getImpliqueAeroport(): ?bool
    {
        return $this->impliqueAeroport;
    }

    public function setImpliqueAeroport(bool $impliqueAeroport): self
    {
        $this->impliqueAeroport = $impliqueAeroport;

        return $this;
    }

   

}
