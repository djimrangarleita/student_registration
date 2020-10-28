<?php

namespace App\Entity;

use App\Repository\RefPayementMethodsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RefPayementMethodsRepository::class)
 */
class RefPayementMethods
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
    private $payement_method_code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $payement_method_description;

    /**
     * @ORM\OneToMany(targetEntity=StudentsPayementMethods::class, mappedBy="payement_method_code", orphanRemoval=true)
     */
    private $studentsPayementMethods;

    public function __construct()
    {
        $this->studentsPayementMethods = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayementMethodCode(): ?string
    {
        return $this->payement_method_code;
    }

    public function setPayementMethodCode(string $payement_method_code): self
    {
        $this->payement_method_code = $payement_method_code;

        return $this;
    }

    public function getPayementMethodDescription(): ?string
    {
        return $this->payement_method_description;
    }

    public function setPayementMethodDescription(?string $payement_method_description): self
    {
        $this->payement_method_description = $payement_method_description;

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
            $studentsPayementMethod->setPayementMethodCode($this);
        }

        return $this;
    }

    public function removeStudentsPayementMethod(StudentsPayementMethods $studentsPayementMethod): self
    {
        if ($this->studentsPayementMethods->removeElement($studentsPayementMethod)) {
            // set the owning side to null (unless already changed)
            if ($studentsPayementMethod->getPayementMethodCode() === $this) {
                $studentsPayementMethod->setPayementMethodCode(null);
            }
        }

        return $this;
    }
}
