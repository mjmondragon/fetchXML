<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Mauricio J Mondragon R <mauro102189@gmail.com>
 * @ORM\Entity(repositoryClass="App\Repository\PictureRepository")
 */
class Picture extends Model
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Listing", inversedBy="pictures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $listing;

    public function getId(): ?int
    {
        return $this->id;
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
    
    public function setPictureUrl(string $url):self
    {
        return $this->setUrl($url);
    }

    public function setPictureTitle(string $title):self
    {
        return $this->setTitle($title);
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

    public function getListing(): ?Listing
    {
        return $this->listing;
    }

    public function setListing(?Listing $listing): self
    {
        $this->listing = $listing;

        return $this;
    }
}
