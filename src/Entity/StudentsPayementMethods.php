<?php

namespace App\Entity;

use App\Repository\StudentsPayementMethodsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StudentsPayementMethodsRepository::class)
 */
class StudentsPayementMethods
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RefPayementMethods::class, inversedBy="studentsPayementMethods")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $payement_method_code;

    /**
     * @ORM\ManyToOne(targetEntity=Students::class, inversedBy="studentsPayementMethods")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * 
     */
    private $student;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bank_details;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $card_details;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $other_details;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayementMethodCode(): ?RefPayementMethods
    {
        return $this->payement_method_code;
    }

    public function setPayementMethodCode(?RefPayementMethods $payement_method_code): self
    {
        $this->payement_method_code = $payement_method_code;

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

    public function getBankDetails(): ?string
    {
        return $this->bank_details;
    }

    public function setBankDetails(?string $bank_details): self
    {
        $this->bank_details = $bank_details;

        return $this;
    }

    public function getCardDetails(): ?string
    {
        return $this->card_details;
    }

    public function setCardDetails(string $card_details): self
    {
        $this->card_details = $card_details;

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
