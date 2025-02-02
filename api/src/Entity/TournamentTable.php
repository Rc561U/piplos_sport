<?php

namespace App\Entity;

use App\Repository\TournamentTableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TournamentTableRepository::class)]
class TournamentTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Sportsman $sportsman = null;

    #[ORM\OneToOne(mappedBy: 'tournamentTable', cascade: ['persist', 'remove'])]
    private ?Competition $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSportsman(): ?Sportsman
    {
        return $this->sportsman;
    }

    public function setSportsman(?Sportsman $sportsman): static
    {
        $this->sportsman = $sportsman;

        return $this;
    }

    public function getName(): ?Competition
    {
        return $this->name;
    }

    public function setName(?Competition $name): static
    {
        // unset the owning side of the relation if necessary
        if ($name === null && $this->name !== null) {
            $this->name->setTournamentTable(null);
        }

        // set the owning side of the relation if necessary
        if ($name !== null && $name->getTournamentTable() !== $this) {
            $name->setTournamentTable($this);
        }

        $this->name = $name;

        return $this;
    }
}
