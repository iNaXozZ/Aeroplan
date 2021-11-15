<?php

namespace App\Entity;

use App\Repository\AeroportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AeroportRepository::class)
 */
class Aeroport
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
    private $oaci;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aita;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $latitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $longitude;

    /**
     * @ORM\OneToMany(targetEntity=Mouvement::class, mappedBy="aeroportDepart")
     */
    private $lesMouvements;

    /**
     * @ORM\OneToMany(targetEntity=Mouvement::class, mappedBy="aeroportArrivee")
     */
    private $lesMouvementsArrivees;

    public function __construct()
    {
        $this->lesMouvements = new ArrayCollection();
        $this->lesMouvementsArrivees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOaci(): ?string
    {
        return $this->oaci;
    }

    public function setOaci(string $oaci): self
    {
        $this->oaci = $oaci;

        return $this;
    }

    public function getAita(): ?string
    {
        return $this->aita;
    }

    public function setAita(string $aita): self
    {
        $this->aita = $aita;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

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
            $lesMouvement->setAeroportDepart($this);
        }

        return $this;
    }

    public function removeLesMouvement(Mouvement $lesMouvement): self
    {
        if ($this->lesMouvements->removeElement($lesMouvement)) {
            // set the owning side to null (unless already changed)
            if ($lesMouvement->getAeroportDepart() === $this) {
                $lesMouvement->setAeroportDepart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mouvement[]
     */
    public function getLesMouvementsArrivees(): Collection
    {
        return $this->lesMouvementsArrivees;
    }

    public function addLesMouvementsArrivee(Mouvement $lesMouvementsArrivee): self
    {
        if (!$this->lesMouvementsArrivees->contains($lesMouvementsArrivee)) {
            $this->lesMouvementsArrivees[] = $lesMouvementsArrivee;
            $lesMouvementsArrivee->setAeroportArrivee($this);
        }

        return $this;
    }

    public function removeLesMouvementsArrivee(Mouvement $lesMouvementsArrivee): self
    {
        if ($this->lesMouvementsArrivees->removeElement($lesMouvementsArrivee)) {
            // set the owning side to null (unless already changed)
            if ($lesMouvementsArrivee->getAeroportArrivee() === $this) {
                $lesMouvementsArrivee->setAeroportArrivee(null);
            }
        }

        return $this;
    }
}
