<?php

namespace App\Entity;

use App\Repository\MouvementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MouvementRepository::class)
 */
class Mouvement
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
    private $codeVol;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroVol;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeureDepart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeureArrivee;

    /**
     * @ORM\OneToMany(targetEntity=Retard::class, mappedBy="leMouvement")
     */
    private $lesRetards;

    /**
     * @ORM\ManyToOne(targetEntity=Aeroport::class, inversedBy="lesMouvements")
     */
    private $aeroportDepart;

    /**
     * @ORM\ManyToOne(targetEntity=Aeroport::class, inversedBy="lesMouvementsArrivees")
     */
    private $aeroportArrivee;

    /**
     * @ORM\ManyToOne(targetEntity=Avion::class, inversedBy="lesMouvements")
     */
    private $avionUtilise;

    public function __construct()
    {
        $this->lesRetards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeVol(): ?string
    {
        return $this->codeVol;
    }

    public function setCodeVol(string $codeVol): self
    {
        $this->codeVol = $codeVol;

        return $this;
    }

    public function getNumeroVol(): ?string
    {
        return $this->numeroVol;
    }

    public function setNumeroVol(string $numeroVol): self
    {
        $this->numeroVol = $numeroVol;

        return $this;
    }

    public function getDateHeureDepart(): ?\DateTimeInterface
    {
        return $this->dateHeureDepart;
    }

    public function setDateHeureDepart(\DateTimeInterface $dateHeureDepart): self
    {
        $this->dateHeureDepart = $dateHeureDepart;

        return $this;
    }

    public function getDateHeureArrivee(): ?\DateTimeInterface
    {
        return $this->dateHeureArrivee;
    }

    public function setDateHeureArrivee(\DateTimeInterface $dateHeureArrivee): self
    {
        $this->dateHeureArrivee = $dateHeureArrivee;

        return $this;
    }

    /**
     * @return Collection|Retard[]
     */
    public function getLesRetards(): Collection
    {
        return $this->lesRetards;
    }

    public function addLesRetard(Retard $lesRetard): self
    {
        if (!$this->lesRetards->contains($lesRetard)) {
            $this->lesRetards[] = $lesRetard;
            $lesRetard->setLeMouvement($this);
        }

        return $this;
    }

    public function removeLesRetard(Retard $lesRetard): self
    {
        if ($this->lesRetards->removeElement($lesRetard)) {
            // set the owning side to null (unless already changed)
            if ($lesRetard->getLeMouvement() === $this) {
                $lesRetard->setLeMouvement(null);
            }
        }

        return $this;
    }

    public function getAeroportDepart(): ?Aeroport
    {
        return $this->aeroportDepart;
    }

    public function setAeroportDepart(?Aeroport $aeroportDepart): self
    {
        $this->aeroportDepart = $aeroportDepart;

        return $this;
    }

    public function getAeroportArrivee(): ?Aeroport
    {
        return $this->aeroportArrivee;
    }

    public function setAeroportArrivee(?Aeroport $aeroportArrivee): self
    {
        $this->aeroportArrivee = $aeroportArrivee;

        return $this;
    }

    public function getAvionUtilise(): ?Avion
    {
        return $this->avionUtilise;
    }

    public function setAvionUtilise(?Avion $avionUtilise): self
    {
        $this->avionUtilise = $avionUtilise;

        return $this;
    }
}
