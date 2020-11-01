<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClassesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ClassesRepository::class)
 * @UniqueEntity(fields={"class_name"}, message="Cette classe existe deja")
 */
class Classes
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
    private $class_name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $class_description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $other_details;

    /**
     * @ORM\OneToMany(targetEntity=StudentClassRegistrations::class, mappedBy="class", orphanRemoval=true)
     */
    private $studentClassRegistrations;

    public function __construct()
    {
        $this->studentClassRegistrations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassName(): ?string
    {
        return $this->class_name;
    }

    public function setClassName(string $class_name): self
    {
        $this->class_name = $class_name;

        return $this;
    }

    public function getClassDescription(): ?string
    {
        return $this->class_description;
    }

    public function setClassDescription(?string $class_description): self
    {
        $this->class_description = $class_description;

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
            $studentClassRegistration->setClass($this);
        }

        return $this;
    }

    public function removeStudentClassRegistration(StudentClassRegistrations $studentClassRegistration): self
    {
        if ($this->studentClassRegistrations->removeElement($studentClassRegistration)) {
            // set the owning side to null (unless already changed)
            if ($studentClassRegistration->getClass() === $this) {
                $studentClassRegistration->setClass(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->class_name;
    }
}
