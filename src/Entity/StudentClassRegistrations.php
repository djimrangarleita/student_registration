<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\StudentClassRegistrationsRepository;


/**
 * @ORM\Entity(repositoryClass=StudentClassRegistrationsRepository::class)
 */
class StudentClassRegistrations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Students::class, inversedBy="studentClassRegistrations")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity=Classes::class, inversedBy="studentClassRegistrations")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $class;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     */
    private $date_of_registration;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_of_first_class;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_of_last_class;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $other_details;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getClass(): ?Classes
    {
        return $this->class;
    }

    public function setClass(?Classes $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getDateOfRegistration(): ?\DateTimeInterface
    {
        return $this->date_of_registration;
    }

    public function setDateOfRegistration(\DateTimeInterface $date_of_registration): self
    {
        $this->date_of_registration = $date_of_registration;

        return $this;
    }

    public function getDateOfFirstClass(): ?\DateTimeInterface
    {
        return $this->date_of_first_class;
    }

    public function setDateOfFirstClass(?\DateTimeInterface $date_of_first_class): self
    {
        $this->date_of_first_class = $date_of_first_class;

        return $this;
    }

    public function getDateOfLastClass(): ?\DateTimeInterface
    {
        return $this->date_of_last_class;
    }

    public function setDateOfLastClass(?\DateTimeInterface $date_of_last_class): self
    {
        $this->date_of_last_class = $date_of_last_class;

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
