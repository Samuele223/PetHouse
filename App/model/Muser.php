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

    #[ORM\OneToMany(targetEntity: Mpost::class, mappedBy: 'seller')]
    private Collection $myPost;

    #[ORM\OneToMany(targetEntity: Mreview::class, mappedBy: 'reviewed')]
    private Collection $reviewToMe;

    #[ORM\OneToMany(targetEntity: Mreview::class, mappedBy: 'reviewer')]
    private Collection $meToReview;

    #[ORM\OneToMany(targetEntity: MPosition::class, mappedBy: 'owner')]
    private Collection $houses;

    #[ORM\OneToMany(targetEntity: Mreport::class, mappedBy: 'reporter')]
    private Collection $report;

    #[ORM\OneToOne(inversedBy:'user')]
    #[ORM\JoinColumn(name: 'photo_id', referencedColumnName: 'id')]
    private Mphoto $profilePicture;

    private static string $entity = Muser::class;


    public function __construct()
    { 
        $this->myPost = new ArrayCollection();
        $this->reviewToMe = new ArrayCollection();
        $this->meToReview = new ArrayCollection();
        $this->houses = new ArrayCollection();
        $this->report = new ArrayCollection();
        //$this->password = password_hash();da finire funzione figa
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword($password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getVerified(): bool
    {
        return $this->verified;
    }

    public function setVerified($verified): static
    {
        $this->verified = $verified;

        return $this;
    }

    public function getRating(): rating
    {
        return $this->rating;
    }
 
    public function setRating($rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getTel(): int
    {
        return $this->tel;
    }

    public function setTel($tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMyPost(): array|Collection
    {
        return $this->myPost;
    }

    public function setMyPost($myPost): static
    {
        $this->myPost = $myPost;

        return $this;
    }

    public function getReviewToMe(): array|Collection
    {
        return $this->reviewToMe;
    }

    public function setReviewToMe($reviewToMe): static
    {
        $this->reviewToMe = $reviewToMe;

        return $this;
    }

    public function getMeToReview(): array|Collection
    {
        return $this->meToReview;
    }

    public function setMeToReview($meToReview): void
    {
        $this->meToReview = $meToReview;

    }

    public function getHouses(): array|Collection
    {
        return $this->houses;
    }

    public function setHouses($houses): void
    {
        $this->houses = $houses;

    }

    public function getReport(): array|Collection
    {
        return $this->report;
    }

    public function setReport($report): void
    {
        $this->report = $report;
    }

    public function getProfilePicture(): Mphoto
    {
        return $this->profilePicture;
    }

    public function setProfilePicture($profilePicture): void
    {
        $this->profilePicture = $profilePicture; 
    }
public static function getEntity(): string
{
return self::$entity;
}
}