<?php

namespace Src\Classes;

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name: "news")]

class News
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]

    private $id;


    #[ORM\Column(type: "string", length: 255)]

    private $title;


    #[ORM\Column(type: "text")]

    private $content;


    #[ORM\Column(type: "datetime")]

    private $publicationDate;


    #[ORM\Column(type: "string", length: 255)]

    private $url;


    #[ORM\Column(type: "string", length: 255)]

    private $image;
    #[ORM\Column(type: "string", length: 255)]

    private $isFavorite;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "favoriteNews", cascade: ["persist"])]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id')]

    private $user;

    // ... Getters and setters for all properties

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     */
    public function setContent($content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of publicationDate
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set the value of publicationDate
     */
    public function setPublicationDate($publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }


    /**
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     */
    public function setUrl($url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }
    /**
     * Get the value of isFavorite
     */
    public function getIsFavorite()
    {
        return $this->isFavorite;
    }

    /**
     * Set the value of isFavorite
     */
    public function setIsFavorite($isFavorite): self
    {
        $this->isFavorite = $isFavorite;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}