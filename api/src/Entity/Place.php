<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Sportsman::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sportsman $sportsman = null;

    #[ORM\ManyToOne(targetEntity: TournamentTable::class, inversedBy: 'places')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TournamentTable $tournamentTable = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Place
    {
        $this->id = $id;
        return $this;
    }

    public function getSportsman(): ?Sportsman
    {
        return $this->sportsman;
    }

    public function setSportsman(?Sportsman $sportsman): Place
    {
        $this->sportsman = $sportsman;
        return $this;
    }

    public function getTournamentTable(): ?TournamentTable
    {
        return $this->tournamentTable;
    }

    public function setTournamentTable(?TournamentTable $tournamentTable): Place
    {
        $this->tournamentTable = $tournamentTable;
        return $this;
    }
}