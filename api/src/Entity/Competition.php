<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'name', cascade: ['persist', 'remove'])]
    private ?TournamentTable $tournamentTable = null;

    #[ORM\Column(length: 255)]
    private ?string $disciplineName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $discription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $venue = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $eventDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTournamentTable(): ?TournamentTable
    {
        return $this->tournamentTable;
    }

    public function setTournamentTable(?TournamentTable $tournamentTable): static
    {
        $this->tournamentTable = $tournamentTable;

        return $this;
    }

    public function getDisciplineName(): ?string
    {
        return $this->disciplineName;
    }

    public function setDisciplineName(string $disciplineName): static
    {
        $this->disciplineName = $disciplineName;

        return $this;
    }

    public function getDiscription(): ?string
    {
        return $this->discription;
    }

    public function setDiscription(?string $discription): static
    {
        $this->discription = $discription;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getVenue(): ?string
    {
        return $this->venue;
    }

    public function setVenue(string $venue): static
    {
        $this->venue = $venue;

        return $this;
    }

    public function getEventDate(): ?\DateTimeInterface
    {
        return $this->eventDate;
    }

    public function setEventDate(?\DateTimeInterface $eventDate): Competition
    {
        $this->eventDate = $eventDate;
        return $this;
    }
}
