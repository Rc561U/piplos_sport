<?php
namespace App\Entity;

use App\Repository\TournamentTableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: TournamentTableRepository::class)]
class TournamentTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'tournamentTable', cascade: ['persist', 'remove'])]
    private ?Competition $competition = null;

    #[ORM\OneToMany(mappedBy: 'tournamentTable', targetEntity: Place::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $places;

    public function __construct()
    {
        $this->places = new ArrayCollection();
    }

    public function addPlace(Place $place): self
    {
        if (!$this->places->contains($place)) {
            $this->places[] = $place;
            $place->setTournamentTable($this);
        }

        return $this;
    }

    public function removePlace(Place $place): self
    {
        if ($this->places->removeElement($place)) {
            if ($place->getTournamentTable() === $this) {
                $place->setTournamentTable(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return (string) $this->id; // Convert ID to string
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;
        return $this;
    }

    public function getPlaces(): Collection
    {
        return $this->places; // Getter for places collection
    }
}
