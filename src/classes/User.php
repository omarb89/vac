<?php

namespace Src\Classes;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


#[ORM\Entity]
#[ORM\Table(name: "user")]
class User
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]

    private $id;


    #[ORM\Column(type: "string", length: 255)]

    private $name;


    #[ORM\Column(type: "string", length: 255)]

    private $lastname;


    #[ORM\Column(type: "date")]

    private $dateOfBirth;


    #[ORM\Column(type: "string", length: 255)]
    private $email;

    #[ORM\Column(type: "string", length: 255)]
    private $password;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $profilePhoto;

    // public function uploadProfilePhoto($photo)
    // {
    //     $targetDir = "/../photoProfil/";
    //     $targetFile = $targetDir . basename($photo["photo_profil"]);

    //     // Déplacer le fichier téléchargé vers le dossier d'uploads
    //     if (move_uploaded_file($photo["tmp_photo_profil"], $targetFile)) {
    //         $this->profilePhoto = $targetFile; // Enregistrer le chemin de la photo de profil
    //         return true; // Téléchargement réussi
    //     } else {
    //         return false; // Échec du téléchargement
    //     }
    // }


    #[ORM\OneToMany(targetEntity: Photo::class, mappedBy: "user")]

    private $photos;


    #[ORM\OneToMany(targetEntity: News::class, mappedBy: "user")]

    private $favoriteNews;

    public function __construct()
    {
        $this->favoriteNews = new ArrayCollection();
    }

    public function addFavoriteNews(News $news): self
    {
        if (!$this->favoriteNews->contains($news)) {
            $this->favoriteNews->add($news);
        }

        return $this;
    }
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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */
    public function setLastname($lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of dateOfBirth
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set the value of dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of photos
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Set the value of photos
     */
    public function setPhotos($photos): self
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get the value of favoriteNews
     */
    public function getFavoriteNews()
    {
        return $this->favoriteNews;
    }

    /**
     * Set the value of favoriteNews
     */
    public function setFavoriteNews($favoriteNews): self
    {
        $this->favoriteNews = $favoriteNews;

        return $this;
    }
    public function getProfilePhoto()
    {
        return $this->profilePhoto;
    }

    /**
     * Set the value of ProfilePhoto
     */
    public function setProfilePhoto($profilePhoto): self
    {
        $this->profilePhoto = $profilePhoto;

        return $this;
    }
}

