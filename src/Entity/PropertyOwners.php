<?php

namespace App\Entity;

use App\Repository\PropertyOwnersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=PropertyOwnersRepository::class)
 */
class PropertyOwners
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $landlord_name;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank
     */
    private $date_first_rental;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $other_landlord_details;

    /**
     * @ORM\OneToMany(targetEntity=Addresses::class, mappedBy="landlord", orphanRemoval=true)
     */
    private $addresses;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLandlordName(): ?string
    {
        return $this->landlord_name;
    }

    public function setLandlordName(string $landlord_name): self
    {
        $this->landlord_name = $landlord_name;

        return $this;
    }

    public function getDateFirstRental(): ?\DateTimeInterface
    {
        return $this->date_first_rental;
    }

    public function setDateFirstRental(\DateTimeInterface $date_first_rental): self
    {
        $this->date_first_rental = $date_first_rental;

        return $this;
    }

    public function getOtherLandlordDetails(): ?string
    {
        return $this->other_landlord_details;
    }

    public function setOtherLandlordDetails(?string $other_landlord_details): self
    {
        $this->other_landlord_details = $other_landlord_details;

        return $this;
    }

    /**
     * @return Collection|Addresses[]
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Addresses $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setLandlord($this);
        }

        return $this;
    }

    public function removeAddress(Addresses $address): self
    {
        if ($this->addresses->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getLandlord() === $this) {
                $address->setLandlord(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->landlord_name;
    }
}
