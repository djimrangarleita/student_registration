<?php

namespace App\Entity;

use App\Repository\RefAddressTypesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RefAddressTypesRepository::class)
 */
class RefAddressTypes
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
    private $address_type_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address_type_description;

    /**
     * @ORM\OneToMany(targetEntity=StudentAddresses::class, mappedBy="address_type_code", orphanRemoval=true)
     */
    private $studentAddresses;

    public function __construct()
    {
        $this->studentAddresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddressTypeCode(): ?string
    {
        return $this->address_type_code;
    }

    public function setAddressTypeCode(string $address_type_code): self
    {
        $this->address_type_code = $address_type_code;

        return $this;
    }

    public function getAddressTypeDescription(): ?string
    {
        return $this->address_type_description;
    }

    public function setAddressTypeDescription(string $address_type_description): self
    {
        $this->address_type_description = $address_type_description;

        return $this;
    }

    /**
     * @return Collection|StudentAddresses[]
     */
    public function getStudentAddresses(): Collection
    {
        return $this->studentAddresses;
    }

    public function addStudentAddress(StudentAddresses $studentAddress): self
    {
        if (!$this->studentAddresses->contains($studentAddress)) {
            $this->studentAddresses[] = $studentAddress;
            $studentAddress->setAddressTypeCode($this);
        }

        return $this;
    }

    public function removeStudentAddress(StudentAddresses $studentAddress): self
    {
        if ($this->studentAddresses->removeElement($studentAddress)) {
            // set the owning side to null (unless already changed)
            if ($studentAddress->getAddressTypeCode() === $this) {
                $studentAddress->setAddressTypeCode(null);
            }
        }

        return $this;
    }
}
