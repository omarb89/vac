<?php

namespace Src\Classes;

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name: "photo")]
class Photo
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]

    private $id;


    #[ORM\Column(type: "string", length: 255)]

    private $path;


    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "photos")]
    #[ORM\JoinColumn(nullable: false)]

    private $user;

    // ... Getters and setters for all properties
}
