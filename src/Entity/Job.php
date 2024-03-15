<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToOne(inversedBy: 'jobs')]
    private ?Category $category = null;

    #[ORM\ManyToMany(targetEntity: JobType::class, inversedBy: 'jobs')]
    private Collection $job_types;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'jobs')]
    private Collection $applicants;

    #[ORM\ManyToOne(inversedBy: 'jobs')]
    private ?Company $company = null;

    public function __construct()
    {
        $this->job_types = new ArrayCollection();
        $this->applicants = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->getTitle();
    }
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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, JobType>
     */
    public function getJobTypes(): Collection
    {
        return $this->job_types;
    }

    public function addJobType(JobType $jobType): static
    {
        if (!$this->job_types->contains($jobType)) {
            $this->job_types->add($jobType);
        }

        return $this;
    }

    public function removeJobType(JobType $jobType): static
    {
        $this->job_types->removeElement($jobType);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getApplicants(): Collection
    {
        return $this->applicants;
    }

    public function addApplicant(User $applicant): static
    {
        if (!$this->applicants->contains($applicant)) {
            $this->applicants->add($applicant);
        }

        return $this;
    }

    public function removeApplicant(User $applicant): static
    {
        $this->applicants->removeElement($applicant);

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): static
    {
        $this->company = $company;

        return $this;
    }
}
