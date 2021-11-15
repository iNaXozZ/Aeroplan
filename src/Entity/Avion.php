<?php

namespace App\Entity;

use App\Repository\AvionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvionRepository::class)
 */
class Avion
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
    private $modele;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroSerie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeInterne;

    /**
     * @ORM\OneToMany(targetEntity=Mouvement::class, mappedBy="avionUtilise")
     */
    private $lesMouvements;

    public function __construct()
    {
        $this->lesMouvements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getNumeroSerie(): ?string
    {
        return $this->numeroSerie;
    }

    public function setNumeroSerie(string $numeroSerie): self
    {
        $this->numeroSerie = $numeroSerie;

        return $this;
    }

    public function getCodeInterne(): ?string
    {
        return $this->codeInterne;
    }

    public function setCodeInterne(string $codeInterne): self
    {
        $this->codeInterne = $codeInterne;

        return $this;
    }

    /**
     * @return Collection|Mouvement[]
     */
    public function getLesMouvements(): Collection
    {
        return $this->lesMouvements;
    }

    public function addLesMouvement(Mouvement $lesMouvement): self
    {
        if (!$this->lesMouvements->contains($lesMouvement)) {
            $this->lesMouvements[] = $lesMouvement;
            $lesMouvement->setAvionUtilise($this);
        }

        return $this;
    }

    public function removeLesMouvement(Mouvement $lesMouvement): self
    {
        if ($this->lesMouvements->removeElement($lesMouvement)) {
            // set the owning side to null (unless already changed)
            if ($lesMouvement->getAvionUtilise() === $this) {
                $lesMouvement->setAvionUtilise(null);
            }
        }

        return $this;
    }
}
