<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Mauricio J Mondragon R <mauro102189@gmail.com>
 * @ORM\Entity(repositoryClass="App\Repository\PropertyRepository")
 */
class Property
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $rooms;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $floor_area;

    /**
     * @ORM\Column(type="boolean")
     */
    private $foreclosure;

    /**
     * @ORM\Column(type="boolean")
     */
    private $by_owner;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_furnished;

    /**
     * @ORM\Column(type="boolean")
     */
    private $air_aconditioning;

    /**
     * @ORM\Column(type="boolean")
     */
    private $equipped_kitchen;

    /**
     * @ORM\Column(type="boolean")
     */
    private $terrace_balcony;

    /**
     * @ORM\Column(type="boolean")
     */
    private $pool_access;

    /**
     * @ORM\Column(type="boolean")
     */
    private $parking;

    /**
     * @ORM\Column(type="boolean")
     */
    private $smoking_allowed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $washing_machine;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dryer;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dishwasher;

    /**
     * @ORM\Column(type="boolean")
     */
    private $oven;

    /**
     * @ORM\Column(type="boolean")
     */
    private $heating_system;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tv;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $min_stay;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $max_stay;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_rooms;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_bathrooms;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Listing", mappedBy="property", cascade={"persist", "remove"})
     */
    private $listing;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRooms(): ?int
    {
        return $this->rooms;
    }

    public function setRooms(int $rooms): self
    {
        $this->rooms = $rooms;

        return $this;
    }

    public function getFloorArea(): ?int
    {
        return $this->floor_area;
    }

    public function setFloorArea(?int $floor_area): self
    {
        $this->floor_area = $floor_area;

        return $this;
    }

    public function getForeclosure(): ?bool
    {
        return $this->foreclosure;
    }

    public function setForeclosure(bool $foreclosure): self
    {
        $this->foreclosure = $foreclosure;

        return $this;
    }

    public function getByOwner(): ?bool
    {
        return $this->by_owner;
    }

    public function setByOwner(bool $by_owner): self
    {
        $this->by_owner = $by_owner;

        return $this;
    }

    public function getIsFurnished(): ?bool
    {
        return $this->is_furnished;
    }

    public function setIsFurnished(bool $is_furnished): self
    {
        $this->is_furnished = $is_furnished;

        return $this;
    }

    public function getAirAconditioning(): ?bool
    {
        return $this->air_aconditioning;
    }

    public function setAirAconditioning(bool $air_aconditioning): self
    {
        $this->air_aconditioning = $air_aconditioning;

        return $this;
    }

    public function getEquippedKitchen(): ?bool
    {
        return $this->equipped_kitchen;
    }

    public function setEquippedKitchen(bool $equipped_kitchen): self
    {
        $this->equipped_kitchen = $equipped_kitchen;

        return $this;
    }

    public function getTerraceBalcony(): ?bool
    {
        return $this->terrace_balcony;
    }

    public function setTerraceBalcony(bool $terrace_balcony): self
    {
        $this->terrace_balcony = $terrace_balcony;

        return $this;
    }

    public function getPoolAccess(): ?bool
    {
        return $this->pool_access;
    }

    public function setPoolAccess(bool $pool_access): self
    {
        $this->pool_access = $pool_access;

        return $this;
    }

    public function getParking(): ?bool
    {
        return $this->parking;
    }

    public function setParking(bool $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

    public function getSmokingAllowed(): ?bool
    {
        return $this->smoking_allowed;
    }

    public function setSmokingAllowed(bool $smoking_allowed): self
    {
        $this->smoking_allowed = $smoking_allowed;

        return $this;
    }

    public function getWashingMachine(): ?bool
    {
        return $this->washing_machine;
    }

    public function setWashingMachine(bool $washing_machine): self
    {
        $this->washing_machine = $washing_machine;

        return $this;
    }

    public function getDryer(): ?bool
    {
        return $this->dryer;
    }

    public function setDryer(bool $dryer): self
    {
        $this->dryer = $dryer;

        return $this;
    }

    public function getDishwasher(): ?bool
    {
        return $this->dishwasher;
    }

    public function setDishwasher(bool $dishwasher): self
    {
        $this->dishwasher = $dishwasher;

        return $this;
    }

    public function getOven(): ?bool
    {
        return $this->oven;
    }

    public function setOven(bool $oven): self
    {
        $this->oven = $oven;

        return $this;
    }

    public function getHeatingSystem(): ?bool
    {
        return $this->heating_system;
    }

    public function setHeatingSystem(bool $heating_system): self
    {
        $this->heating_system = $heating_system;

        return $this;
    }

    public function getTv(): ?bool
    {
        return $this->tv;
    }

    public function setTv(bool $tv): self
    {
        $this->tv = $tv;

        return $this;
    }

    public function getMinStay(): ?int
    {
        return $this->min_stay;
    }

    public function setMinStay(?int $min_stay): self
    {
        $this->min_stay = $min_stay;

        return $this;
    }

    public function getMaxStay(): ?int
    {
        return $this->max_stay;
    }

    public function setMaxStay(?int $max_stay): self
    {
        $this->max_stay = $max_stay;

        return $this;
    }

    public function getNumberRooms(): ?int
    {
        return $this->number_rooms;
    }

    public function setNumberRooms(int $number_rooms): self
    {
        $this->number_rooms = $number_rooms;

        return $this;
    }

    public function getNumberBathrooms(): ?bool
    {
        return $this->number_bathrooms;
    }

    public function setNumberBathrooms(bool $number_bathrooms): self
    {
        $this->number_bathrooms = $number_bathrooms;

        return $this;
    }

    public function getListing(): ?Listing
    {
        return $this->listing;
    }

    public function setListing(Listing $listing): self
    {
        $this->listing = $listing;

        // set the owning side of the relation if necessary
        if ($this !== $listing->getProperty()) {
            $listing->setProperty($this);
        }

        return $this;
    }
}
