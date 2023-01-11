<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    private ?int $mileage = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $energy = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $registrationPlate = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    private ?bool $isAvailable = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\ManyToOne(inversedBy: 'vehicle')]
    private ?Collectivity $collectivity = null;

    #[ORM\OneToOne(mappedBy: 'vehicle', cascade: ['persist', 'remove'])]
    private ?Customer $customer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getEnergy(): ?string
    {
        return $this->energy;
    }

    public function setEnergy(string $energy): self
    {
        $this->energy = $energy;

        return $this;
    }

    public function getRegistrationPlate(): ?string
    {
        return $this->registrationPlate;
    }

    public function setRegistrationPlate(string $registrationPlate): self
    {
        $this->registrationPlate = $registrationPlate;

        return $this;
    }

    public function isIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCollectivity(): ?Collectivity
    {
        return $this->collectivity;
    }

    public function setCollectivity(?Collectivity $collectivity): self
    {
        $this->collectivity = $collectivity;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        // unset the owning side of the relation if necessary
        if ($customer === null && $this->customer !== null) {
            $this->customer->setVehicle(null);
        }

        // set the owning side of the relation if necessary
        if ($customer !== null && $customer->getVehicle() !== $this) {
            $customer->setVehicle($this);
        }

        $this->customer = $customer;

        return $this;
    }
}
