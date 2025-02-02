<?php

namespace App\Entity;

use App\Repository\SportsmanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: SportsmanRepository::class)]
#[Vich\Uploadable]
class Sportsman
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fullName = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(length: 255)]
    private string $sex;

    #[Vich\UploadableField(mapping: 'products', fileNameProperty: 'imageName', size: 'imageSize')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageSize = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

//    #[ORM\ManyToMany(targetEntity: Сompetition::class)]
//    #[ORM\JoinTable(name: 'link_sportsman_competition')]
//    #[ORM\JoinColumn(name: 'sportsman_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
//    #[ORM\InverseJoinColumn(name: 'competition_id', referencedColumnName: 'id', nullable: false)]
//    private Collection $competitions;

    #[ORM\OneToMany(mappedBy: 'sportsman', targetEntity: SocialNetwork::class, cascade: ['persist', 'remove'])]
    private Collection $socialLinks;

    public function __construct()
    {
        $this->socialLinks = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getFullName(); // Change this to a relevant property
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): static
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): static
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function setSex(string $sex): Sportsman
    {
        $this->sex = $sex;
        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): Sportsman
    {
        $this->imageName = $imageName;
        return $this;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public function setImageSize(?int $imageSize): Sportsman
    {
        $this->imageSize = $imageSize;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): Sportsman
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getSocialLinks(): Collection
    {
        return $this->socialLinks;
    }

    public function addSocialLink(SocialNetwork $socialLink): self
    {
        if (!$this->socialLinks->contains($socialLink)) {
            $this->socialLinks[] = $socialLink;
            $socialLink->setSportsman($this);
        }

        return $this;
    }

    public function removeSocialLink(SocialNetwork $socialLink): self
    {
        if ($this->socialLinks->removeElement($socialLink)) {
            // Set the owning side to null (unless already changed)
            if ($socialLink->getSportsman() === $this) {
                $socialLink->setSportsman(null);
            }
        }

        return $this;
    }

}
