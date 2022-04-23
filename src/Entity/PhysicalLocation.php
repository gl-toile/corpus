<?php

namespace App\Entity;

use App\Repository\PhysicalLocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PhysicalLocationRepository::class)
 */
class PhysicalLocation
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
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=PhysicalLocation::class, inversedBy="subLocations")
     */
    private $parentLocation;

    /**
     * @ORM\OneToMany(targetEntity=PhysicalLocation::class, mappedBy="parentLocation")
     */
    private $subLocations;

    /**
     * @ORM\OneToMany(targetEntity=Artwork::class, mappedBy="physicalLocation")
     */
    private $artworks;

    public function __construct()
    {
        $this->subLocations = new ArrayCollection();
        $this->artworks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getParentLocation(): ?self
    {
        return $this->parentLocation;
    }

    public function setParentLocation(?self $parentLocation): self
    {
        $this->parentLocation = $parentLocation;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getSubLocations(): Collection
    {
        return $this->subLocations;
    }

    public function addSubLocation(self $subLocation): self
    {
        if (!$this->subLocations->contains($subLocation)) {
            $this->subLocations[] = $subLocation;
            $subLocation->setParentLocation($this);
        }

        return $this;
    }

    public function removeSubLocation(self $subLocation): self
    {
        if ($this->subLocations->removeElement($subLocation)) {
            // set the owning side to null (unless already changed)
            if ($subLocation->getParentLocation() === $this) {
                $subLocation->setParentLocation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Artwork>
     */
    public function getArtworks(): Collection
    {
        return $this->artworks;
    }

    public function addArtwork(Artwork $artwork): self
    {
        if (!$this->artworks->contains($artwork)) {
            $this->artworks[] = $artwork;
            $artwork->setPhysicalLocation($this);
        }

        return $this;
    }

    public function removeArtwork(Artwork $artwork): self
    {
        if ($this->artworks->removeElement($artwork)) {
            // set the owning side to null (unless already changed)
            if ($artwork->getPhysicalLocation() === $this) {
                $artwork->setPhysicalLocation(null);
            }
        }

        return $this;
    }

    public function __toString():string
    {
        return $this->title;
    }
}
