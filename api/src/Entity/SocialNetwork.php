<?php

namespace App\Entity;

use App\Repository\SocialNetworkRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocialNetworkRepository::class)]
class SocialNetwork
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $worldAthleticLink = null;

    #[ORM\Column(length: 255)]
    private ?string $linkName = null;

    #[ORM\Column(length: 255)]
    private ?string $linkUrl = null;

    #[ORM\ManyToOne(targetEntity: Sportsman::class, inversedBy: 'socialLinks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sportsman $sportsman = null;


    public function getSportsman(): ?Sportsman
    {
        return $this->sportsman;
    }

    public function setSportsman(?Sportsman $sportsman): self
    {
        $this->sportsman = $sportsman;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWorldAthleticLink(): ?string
    {
        return $this->worldAthleticLink;
    }

    public function setWorldAthleticLink(?string $worldAthleticLink): SocialNetwork
    {
        $this->worldAthleticLink = $worldAthleticLink;
        return $this;
    }

    public function getLinkName(): ?string
    {
        return $this->linkName;
    }

    public function setLinkName(string $linkName): static
    {
        $this->linkName = $linkName;

        return $this;
    }

    public function getLinkUrl(): ?string
    {
        return $this->linkUrl;
    }

    public function setLinkUrl(string $linkUrl): static
    {
        $this->linkUrl = $linkUrl;

        return $this;
    }

}
