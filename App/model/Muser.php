<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

require_once 'rating.php';

#[ORM\Entity]
#[ORM\Table(name: 'user')]
class Muser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private string $name;

    #[ORM\Column]
    private string $email;

    #[ORM\Column]
    private string $password;

    #[ORM\Column]
    private bool $verified;

    #[ORM\Column(enumType: rating::class)]
    private rating $rating;

    #[ORM\Column]
    private int $tel;

    #[ORM\Column(type: 'decimal', precision: 11, scale: 8)]
    private float $longitude;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 8)]
    private float $latitude;

    #[ORM\OneToMany(targetEntity: Mpost::class, mappedBy: 'costumer')]
    private Collection $acceptedPost;

    #[ORM\OneToMany(targetEntity: Mpost::class, mappedBy: 'seller')]
    private Collection $myPost;

    #[ORM\OneToMany(targetEntity: Mreview::class, mappedBy: 'reviewed')]
    private Collection $reviewToMe;

    #[ORM\OneToMany(targetEntity: Mreview::class, mappedBy: 'reviewer')]
    private Collection $meToReview;

    public function __construct()
    {
        $this->acceptedPost = new ArrayCollection();
        $this->myPost = new ArrayCollection();
        $this->reviewToMe = new ArrayCollection();
        $this->meToReview = new ArrayCollection();
    }
}