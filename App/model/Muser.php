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
    private string $surname;

    #[ORM\Column]
    private string $username;

    #[ORM\Column]
    private string $email;

    #[ORM\Column]
    private string $password;

    #[ORM\Column]
    private bool $verified;

    #[ORM\Column(enumType: rating::class, nullable: true)]
    private ?rating $rating = null;

    #[ORM\Column(nullable:true)]
    private ?int $tel = true;

    #[ORM\OneToMany(targetEntity: Mpost::class, mappedBy: 'seller', nullable: true)]
    private ?Collection $myPost=null;

    #[ORM\OneToMany(targetEntity: Mreview::class, mappedBy: 'reviewed', nullable:true)]
    private ?Collection $reviewToMe=null;

    #[ORM\OneToMany(targetEntity: Mreview::class, mappedBy: 'reviewer', nullable:true)]
    private ?Collection $meToReview=null;

    #[ORM\OneToMany(targetEntity: MPosition::class, mappedBy: 'owner', nullable:true)]
    private ?Collection $houses=null;

    #[ORM\OneToMany(targetEntity: Mreport::class, mappedBy: 'reporter', nullable:true)]
    private ?Collection $report=null;

    #[ORM\OneToOne(inversedBy:'user')]
    #[ORM\JoinColumn(name: 'photo_id', referencedColumnName: 'id', nullable:true)]
    private ?Mphoto $profilePicture=null;

    private static string $entity = Muser::class;


    public function __construct(string $name, string $surname, string $username, string $email, string $password, bool $verified)
    { 
        $this->myPost = new ArrayCollection();
        $this->reviewToMe = new ArrayCollection();
        $this->meToReview = new ArrayCollection();
        $this->houses = new ArrayCollection();
        $this->report = new ArrayCollection();
        
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->email = $email;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
        $this->verified = $verified;
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
    public function getSurname()
    {
        return $this->surname;
    }
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
}