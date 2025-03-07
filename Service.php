<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $_dt_creation = null;

    /**
     * @var Collection<int, employe>
     */
    #[ORM\OneToMany(targetEntity: employe::class, mappedBy: 'no')]
    private Collection $employe;

    public function __construct()
    {
        $this->employe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDtCreation(): ?\DateTimeInterface
    {
        return $this->_dt_creation;
    }

    public function setDtCreation(\DateTimeInterface $_dt_creation): static
    {
        $this->_dt_creation = $_dt_creation;

        return $this;
    }

    /**
     * @return Collection<int, employe>
     */
    public function getEmploye(): Collection
    {
        return $this->employe;
    }

    public function addEmploye(employe $employe): static
    {
        if (!$this->employe->contains($employe)) {
            $this->employe->add($employe);
            $employe->setNo($this);
        }

        return $this;
    }

    public function removeEmploye(employe $employe): static
    {
        if ($this->employe->removeElement($employe)) {
            // set the owning side to null (unless already changed)
            if ($employe->getNo() === $this) {
                $employe->setNo(null);
            }
        }

        return $this;
    }
}
