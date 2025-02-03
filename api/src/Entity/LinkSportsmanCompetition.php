<?php

namespace App\Entity;

use App\Repository\LinkSportsmanCompetitionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LinkSportsmanCompetitionRepository::class)]
class LinkSportsmanCompetition
{

    #[ORM\ManyToOne(targetEntity: Sportsman::class)]
    #[ORM\JoinColumn(name: 'sportsman_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Sportsman $sportsman = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Competition::class)]
    #[ORM\JoinColumn(name: 'competition_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private Competition $competition;


    public function getSportsman(): ?Sportsman
    {
        return $this->sportsman;
    }

    public function setSportsman(?Sportsman $sportsman): LinkSportsmanCompetition
    {
        $this->sportsman = $sportsman;
        return $this;
    }

    public function getCompetition(): Competition
    {
        return $this->competition;
    }

    public function setCompetition(Competition $competition): LinkSportsmanCompetition
    {
        $this->competition = $competition;
        return $this;
    }
}
