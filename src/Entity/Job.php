<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobRepository::class)]
class Job
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $remote_allowed = null;

    #[ORM\Column]
    private ?float $salary_range = null;

    #[ORM\Column]
    private ?float $salary_max = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isRemoteAllowed(): ?bool
    {
        return $this->remote_allowed;
    }

    public function setRemoteAllowed(bool $remote_allowed): static
    {
        $this->remote_allowed = $remote_allowed;

        return $this;
    }

    public function getSalaryRange(): ?float
    {
        return $this->salary_range;
    }

    public function setSalaryRange(float $salary_range): static
    {
        $this->salary_range = $salary_range;

        return $this;
    }

    public function getSalaryMax(): ?float
    {
        return $this->salary_max;
    }

    public function setSalaryMax(float $salary_max): static
    {
        $this->salary_max = $salary_max;

        return $this;
    }
}
