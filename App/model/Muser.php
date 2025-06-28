<?php





use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\BooleanType;
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

    #[ORM\Column(nullable: true)]
    private bool $verified = false;

    #[ORM\Column( nullable: true)]
    private ?float $rating = 0.0;

    #[ORM\Column(nullable:true)]
    private ?int $tel; 

    #[ORM\OneToMany(targetEntity: Mpost::class, mappedBy: 'seller')]
    private ?Collection $myPost=null;

    #[ORM\OneToMany(targetEntity: Mreview::class, mappedBy: 'reviewed')]
    private ?Collection $reviewToMe=null;

    #[ORM\OneToMany(targetEntity: Mreview::class, mappedBy: 'reviewer')]
    private ?Collection $meToReview=null;

    #[ORM\OneToMany(targetEntity: MPosition::class, mappedBy: 'owner')]
    private ?Collection $houses=null;

    #[ORM\OneToMany(targetEntity: Mreport::class, mappedBy: 'reporter')]
    private ?Collection $report=null;

    #[ORM\OneToOne(inversedBy:'user')]
    #[ORM\JoinColumn(name: 'photo_id', referencedColumnName: 'id')]
    private ?Mphoto $profilePicture=null;

    #[ORM\OneToMany(targetEntity: Moffer::class, mappedBy: 'client')] 
    private ?Collection $listOfOffers = null;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Mverification $verification = null;

    private static string $entity = Muser::class;


    public function __construct(string $name, string $surname, string $username, string $email)
    { 
        $this->myPost = new ArrayCollection();
        $this->reviewToMe = new ArrayCollection();
        $this->meToReview = new ArrayCollection();
        $this->houses = new ArrayCollection();
        $this->report = new ArrayCollection();
        $this->listOfOffers = new ArrayCollection();
        
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->email = $email;
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
        $this->password = password_hash($password, PASSWORD_DEFAULT);

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

    public function getRating()
    {
        return $this->rating;
    }
 
    public function setRating($rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getTel(): ?int
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

    public function getProfilePicture() 
    {
        if($this->profilePicture)
        {
            return $this->profilePicture;
        }
        else
        {
            return null;
    }
    }

    public function setProfilePicture($profilePicture): void
    {
        $this->profilePicture = $profilePicture; 
    }
    public static function getEntity(): string
    {
    return self::$entity;
    }
    public function getSurname(): string
    {
        return $this->surname;
    }
    public function setSurname($surname): static
    {
        $this->surname = $surname;

        return $this;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function setUsername($username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getListOfOffers()
    {
        return $this->listOfOffers;
    }

    public function getVerification(): ?Mverification
    {
        return $this->verification;
    }

    public function setVerification(?Mverification $verification): self
    {
        // Semplifica la logica per evitare errori
        $this->verification = $verification;
        
        // Aggiorna automaticamente anche il flag booleano
        if ($verification !== null && $verification->isApproved()) {
            $this->verified = true;
        }
        
        return $this;
    }
}