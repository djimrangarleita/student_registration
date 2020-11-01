<?php

namespace App\Entity;

use App\Repository\RefRelationshipTypesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=RefRelationshipTypesRepository::class)
 */
class RefRelationshipTypes
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
    private $relationship_type_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $relation_type_description;

    /**
     * @ORM\OneToMany(targetEntity=StudentsRelationships::class, mappedBy="relationship_type_code", orphanRemoval=true)
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

    public function getRelationshipTypeCode(): ?string
    {
        return $this->relationship_type_code;
    }

    public function setRelationshipTypeCode(string $relationship_type_code): self
    {
        $this->relationship_type_code = $relationship_type_code;

        return $this;
    }

    public function getRelationTypeDescription(): ?string
    {
        return $this->relation_type_description;
    }

    public function setRelationTypeDescription(string $relation_type_description): self
    {
        $this->relation_type_description = $relation_type_description;

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
            $studentsRelationship->setRelationshipTypeCode($this);
        }

        return $this;
    }

    public function removeStudentsRelationship(StudentsRelationships $studentsRelationship): self
    {
        if ($this->studentsRelationships->removeElement($studentsRelationship)) {
            // set the owning side to null (unless already changed)
            if ($studentsRelationship->getRelationshipTypeCode() === $this) {
                $studentsRelationship->setRelationshipTypeCode(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->relationship_type_code;
    }
}
