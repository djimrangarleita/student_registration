<?php

namespace App\Entity;

use App\Repository\StudentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentsRepository::class)
 */
class Students
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
    private $gender;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $middle_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cell_mobile_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_address;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_first_rental;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_left_university;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $other_student_details;

    /**
     * @ORM\OneToMany(targetEntity=StudentClassRegistrations::class, mappedBy="student", orphanRemoval=true)
     */
    private $studentClassRegistrations;

    /**
     * @ORM\OneToMany(targetEntity=StudentsPayementMethods::class, mappedBy="student", orphanRemoval=true)
     */
    private $studentsPayementMethods;

    /**
     * @ORM\OneToMany(targetEntity=StudentAddresses::class, mappedBy="student", orphanRemoval=true)
     */
    private $studentAddresses;

    /**
     * @ORM\OneToMany(targetEntity=StudentsRelationships::class, mappedBy="student", orphanRemoval=true)
     */
    private $studentsRelationships;

    public function __construct()
    {
        $this->studentClassRegistrations = new ArrayCollection();
        $this->studentsPayementMethods = new ArrayCollection();
        $this->studentAddresses = new ArrayCollection();
        $this->studentsRelationships = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateFirstRental(): ?\DateTimeInterface
    {
        return $this->date_first_rental;
    }

    public function setDateFirstRental(\DateTimeInterface $date_first_rental): self
    {
        $this->date_first_rental = $date_first_rental;

        return $this;
    }

    public function getDateLeftUniversity(): ?\DateTimeInterface
    {
        return $this->date_left_university;
    }

    public function setDateLeftUniversity(?\DateTimeInterface $date_left_university): self
    {
        $this->date_left_university = $date_left_university;

        return $this;
    }

    public function getOtherStudentDetails(): ?string
    {
        return $this->other_student_details;
    }

    public function setOtherStudentDetails(?string $other_student_details): self
    {
        $this->other_student_details = $other_student_details;

        return $this;
    }

    /**
     * @return Collection|StudentClassRegistrations[]
     */
    public function getStudentClassRegistrations(): Collection
    {
        return $this->studentClassRegistrations;
    }

    public function addStudentClassRegistration(StudentClassRegistrations $studentClassRegistration): self
    {
        if (!$this->studentClassRegistrations->contains($studentClassRegistration)) {
            $this->studentClassRegistrations[] = $studentClassRegistration;
            $studentClassRegistration->setStudent($this);
        }

        return $this;
    }

    public function removeStudentClassRegistration(StudentClassRegistrations $studentClassRegistration): self
    {
        if ($this->studentClassRegistrations->removeElement($studentClassRegistration)) {
            // set the owning side to null (unless already changed)
            if ($studentClassRegistration->getStudent() === $this) {
                $studentClassRegistration->setStudent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|StudentsPayementMethods[]
     */
    public function getStudentsPayementMethods(): Collection
    {
        return $this->studentsPayementMethods;
    }

    public function addStudentsPayementMethod(StudentsPayementMethods $studentsPayementMethod): self
    {
        if (!$this->studentsPayementMethods->contains($studentsPayementMethod)) {
            $this->studentsPayementMethods[] = $studentsPayementMethod;
            $studentsPayementMethod->setStudent($this);
        }

        return $this;
    }

    public function removeStudentsPayementMethod(StudentsPayementMethods $studentsPayementMethod): self
    {
        if ($this->studentsPayementMethods->removeElement($studentsPayementMethod)) {
            // set the owning side to null (unless already changed)
            if ($studentsPayementMethod->getStudent() === $this) {
                $studentsPayementMethod->setStudent(null);
            }
        }

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
            $studentAddress->setStudent($this);
        }

        return $this;
    }

    public function removeStudentAddress(StudentAddresses $studentAddress): self
    {
        if ($this->studentAddresses->removeElement($studentAddress)) {
            // set the owning side to null (unless already changed)
            if ($studentAddress->getStudent() === $this) {
                $studentAddress->setStudent(null);
            }
        }

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
            $studentsRelationship->setStudent($this);
        }

        return $this;
    }

    public function removeStudentsRelationship(StudentsRelationships $studentsRelationship): self
    {
        if ($this->studentsRelationships->removeElement($studentsRelationship)) {
            // set the owning side to null (unless already changed)
            if ($studentsRelationship->getStudent() === $this) {
                $studentsRelationship->setStudent(null);
            }
        }

        return $this;
    }
}
