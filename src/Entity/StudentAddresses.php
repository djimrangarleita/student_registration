<?php

namespace App\Entity;

use App\Repository\StudentAddressesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StudentAddressesRepository::class)
 */
class StudentAddresses
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RefAddressTypes::class, inversedBy="studentAddresses")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $address_type_code;

    /**
     * @ORM\ManyToOne(targetEntity=Students::class, inversedBy="studentAddresses")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity=Addresses::class, inversedBy="studentAddresses")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $address;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank
     */
    private $date_address_from;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Assert\NotBlank
     */
    private $date_address_to;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $monthly_rental;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $other_details;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddressTypeCode(): ?RefAddressTypes
    {
        return $this->address_type_code;
    }

    public function setAddressTypeCode(?RefAddressTypes $address_type_code): self
    {
        $this->address_type_code = $address_type_code;

        return $this;
    }

    public function getStudent(): ?Students
    {
        return $this->student;
    }

    public function setStudent(?Students $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getAddress(): ?Addresses
    {
        return $this->address;
    }

    public function setAddress(?Addresses $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDateAddressFrom(): ?\DateTimeInterface
    {
        return $this->date_address_from;
    }

    public function setDateAddressFrom(\DateTimeInterface $date_address_from): self
    {
        $this->date_address_from = $date_address_from;

        return $this;
    }

    public function getDateAddressTo(): ?\DateTimeInterface
    {
        return $this->date_address_to;
    }

    public function setDateAddressTo(?\DateTimeInterface $date_address_to): self
    {
        $this->date_address_to = $date_address_to;

        return $this;
    }

    public function getMonthlyRental(): ?string
    {
        return $this->monthly_rental;
    }

    public function setMonthlyRental(string $monthly_rental): self
    {
        $this->monthly_rental = $monthly_rental;

        return $this;
    }

    public function getOtherDetails(): ?string
    {
        return $this->other_details;
    }

    public function setOtherDetails(?string $other_details): self
    {
        $this->other_details = $other_details;

        return $this;
    }
}
