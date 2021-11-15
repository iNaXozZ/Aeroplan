<?php

namespace App\Entity;

use App\Repository\TypeRetardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRetardRepository::class)
 */
class TypeRetard
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
    private $codeSituation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Retard::class, mappedBy="type")
     */
    private $lesRetards;

    public function __construct()
    {
        $this->lesRetards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeSituation(): ?string
    {
        return $this->codeSituation;
    }

    public function setCodeSituation(string $codeSituation): self
    {
        $this->codeSituation = $codeSituation;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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
            $lesRetard->setType($this);
        }

        return $this;
    }

    public function removeLesRetard(Retard $lesRetard): self
    {
        if ($this->lesRetards->removeElement($lesRetard)) {
            // set the owning side to null (unless already changed)
            if ($lesRetard->getType() === $this) {
                $lesRetard->setType(null);
            }
        }

        return $this;
    }
}
