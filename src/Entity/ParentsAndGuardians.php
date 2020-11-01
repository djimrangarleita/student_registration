<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\ParentsAndGuardiansRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=ParentsAndGuardiansRepository::class)
 * @UniqueEntity(fields={"email_address"}, message="Adresse email deja pris")
 */
class ParentsAndGuardians
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Addresses::class, inversedBy="parentsAndGuardians")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $middle_name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(
     * pattern="/[0-9]/")
     * @Assert\NotBlank
     * @Assert\Length(min="8", max="14")
     */
    private $cell_mobile_number;

    /**
     * @ORM\Column(type="string", length=255)
     * Assert\Email
     */
    private $email_address;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $other_details;

    /**
     * @ORM\OneToMany(targetEntity=StudentsRelationships::class, mappedBy="person", orphanRemoval=true)
     */
    private $studentsRelationships;

    public function __construct()
    {
        $this->studentsRelationships = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->middle_name;
    }

    public function setMiddleName(?string $middle_name): self
    {
        $this->middle_name = $middle_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getCellMobileNumber(): ?string
    {
        return $this->cell_mobile_number;
    }

    public function setCellMobileNumber(string $cell_mobile_number): self
    {
        $this->cell_mobile_number = $cell_mobile_number;

        return $this;
    }

    public function getEmailAddress(): ?string
    {
        return $this->email_address;
    }

    public function setEmailAddress(string $email_address): self
    {
        $this->email_address = $email_address;

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

    /**
     * @return Collection|StudentsRelationships[]
     */
    public function getStudentsRelationships(): Collection
    {
        return $this->studentsRelationships;
    }

    public function addStudentsRelationship(StudentsRelationships $studentsRelationship): self
    {
        if (!$this->studentsRelationships->contains($studentsRelationship)) {
            $this->studentsRelationships[] = $studentsRelationship;
            $studentsRelationship->setPerson($this);
        }

        return $this;
    }

    public function removeStudentsRelationship(StudentsRelationships $studentsRelationship): self
    {
        if ($this->studentsRelationships->removeElement($studentsRelationship)) {
            // set the owning side to null (unless already changed)
            if ($studentsRelationship->getPerson() === $this) {
                $studentsRelationship->setPerson(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->email_address;
    }
}
