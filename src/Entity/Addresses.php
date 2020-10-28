<?php

namespace App\Entity;

use App\Repository\AddressesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AddressesRepository::class)
 */
class Addresses
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=PropertyOwners::class, inversedBy="addresses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $landlord;

    /**
     * @ORM\Column(type="boolean")
     */
    private $university_accommodation_yn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $line_1_number_building;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $line_2_number_street;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $line_3_area_locality;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zip_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $state_province_country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $other_address_details;

    /**
     * @ORM\OneToMany(targetEntity=StudentAddresses::class, mappedBy="address", orphanRemoval=true)
     */
    private $studentAddresses;

    /**
     * @ORM\OneToMany(targetEntity=ParentsAndGuardians::class, mappedBy="address", orphanRemoval=true)
     */
    private $parentsAndGuardians;

    public function __construct()
    {
        $this->studentAddresses = new ArrayCollection();
        $this->parentsAndGuardians = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLandlord(): ?PropertyOwners
    {
        return $this->landlord;
    }

    public function setLandlord(?PropertyOwners $landlord): self
    {
        $this->landlord = $landlord;

        return $this;
    }

    public function getUniversityAccommodationYn(): ?bool
    {
        return $this->university_accommodation_yn;
    }

    public function setUniversityAccommodationYn(bool $university_accommodation_yn): self
    {
        $this->university_accommodation_yn = $university_accommodation_yn;

        return $this;
    }

    public function getLine1NumberBuilding(): ?string
    {
        return $this->line_1_number_building;
    }

    public function setLine1NumberBuilding(string $line_1_number_building): self
    {
        $this->line_1_number_building = $line_1_number_building;

        return $this;
    }

    public function getLine2NumberStreet(): ?string
    {
        return $this->line_2_number_street;
    }

    public function setLine2NumberStreet(string $line_2_number_street): self
    {
        $this->line_2_number_street = $line_2_number_street;

        return $this;
    }

    public function getLine3AreaLocality(): ?string
    {
        return $this->line_3_area_locality;
    }

    public function setLine3AreaLocality(string $line_3_area_locality): self
    {
        $this->line_3_area_locality = $line_3_area_locality;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zip_code;
    }

    public function setZipCode(string $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getStateProvinceCountry(): ?string
    {
        return $this->state_province_country;
    }

    public function setStateProvinceCountry(string $state_province_country): self
    {
        $this->state_province_country = $state_province_country;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getOtherAddressDetails(): ?string
    {
        return $this->other_address_details;
    }

    public function setOtherAddressDetails(?string $other_address_details): self
    {
        $this->other_address_details = $other_address_details;

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
            $studentAddress->setAddress($this);
        }

        return $this;
    }

    public function removeStudentAddress(StudentAddresses $studentAddress): self
    {
        if ($this->studentAddresses->removeElement($studentAddress)) {
            // set the owning side to null (unless already changed)
            if ($studentAddress->getAddress() === $this) {
                $studentAddress->setAddress(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ParentsAndGuardians[]
     */
    public function getParentsAndGuardians(): Collection
    {
        return $this->parentsAndGuardians;
    }

    public function addParentsAndGuardian(ParentsAndGuardians $parentsAndGuardian): self
    {
        if (!$this->parentsAndGuardians->contains($parentsAndGuardian)) {
            $this->parentsAndGuardians[] = $parentsAndGuardian;
            $parentsAndGuardian->setAddress($this);
        }

        return $this;
    }

    public function removeParentsAndGuardian(ParentsAndGuardians $parentsAndGuardian): self
    {
        if ($this->parentsAndGuardians->removeElement($parentsAndGuardian)) {
            // set the owning side to null (unless already changed)
            if ($parentsAndGuardian->getAddress() === $this) {
                $parentsAndGuardian->setAddress(null);
            }
        }

        return $this;
    }
}
