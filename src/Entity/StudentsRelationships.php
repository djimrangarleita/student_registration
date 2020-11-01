<?php

namespace App\Entity;

use App\Repository\StudentsRelationshipsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StudentsRelationshipsRepository::class)
 */
class StudentsRelationships
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Students::class, inversedBy="studentsRelationships")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity=ParentsAndGuardians::class, inversedBy="studentsRelationships")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $person;

    /**
     * @ORM\ManyToOne(targetEntity=RefRelationshipTypes::class, inversedBy="studentsRelationships")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $relationship_type_code;

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

    public function getPerson(): ?ParentsAndGuardians
    {
        return $this->person;
    }

    public function setPerson(?ParentsAndGuardians $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function getRelationshipTypeCode(): ?RefRelationshipTypes
    {
        return $this->relationship_type_code;
    }

    public function setRelationshipTypeCode(?RefRelationshipTypes $relationship_type_code): self
    {
        $this->relationship_type_code = $relationship_type_code;

        return $this;
    }
}
