<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Mauricio J Mondragon <mauro102189@gmail.com>
 * @ORM\Entity(repositoryClass="App\Repository\ListingRepository")
 * 
 */
class Listing implements \JsonSerializable
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
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Price", inversedBy="price", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Picture", mappedBy="listing")
     */
    private $pictures;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Property", inversedBy="listing", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $property;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id):self
    {
        $this->id = $id;
        return $this;
    }
    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPrice(): ?Price
    {
        return $this->price;
    }

    public function setPrice(Price $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            //$picture->setListing($this);
        }

        return $this;
    }
    /**
     * Return the first picture in the pictures collection, if the listing does not have pictures this
     * function return a default picture
     *
     * @return Picture
     */
    public function getMainImage()
    {
        $image = $this->getPictures()->first();
        if(!$image){
            $image = new Picture();
            $image->setTitle('No image');
            $image->setUrl('/img/noimage.jpeg');
        }
        return $image;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->contains($picture)) {
            $this->pictures->removeElement($picture);
            // set the owning side to null (unless already changed)
            if ($picture->getListing() === $this) {
                $picture->setListing(null);
            }
        }

        return $this;
    }

    public function getProperty(): ?Property
    {
        return $this->property;
    }

    public function setProperty(Property $property): self
    {
        $this->property = $property;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function jsonSerialize() : array
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'url' => $this->getUrl(),
            'city' => $this->getCity(),
            'main_image' => ['title' => $this->getMainImage()->getTitle(), 'url' => $this->getMainImage()->getUrl()]
        ];
    }
}
