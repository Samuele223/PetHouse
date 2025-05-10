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


    public function __construct()
    { 
        $this->myPost = new ArrayCollection();
        $this->reviewToMe = new ArrayCollection();
        $this->meToReview = new ArrayCollection();
        $this->houses = new ArrayCollection();
        $this->report = new ArrayCollection();
        //$this->password = password_hash();da finire funzione figa
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getVerified()
    {
        return $this->verified;
    }

    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    public function getRating()
    {
        return $this->rating;
    }
 
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMyPost()
    {
        return $this->myPost;
    }

    public function setMyPost($myPost)
    {
        $this->myPost = $myPost;

        return $this;
    }

    public function getReviewToMe()
    {
        return $this->reviewToMe;
    }

    public function setReviewToMe($reviewToMe)
    {
        $this->reviewToMe = $reviewToMe;

        return $this;
    }

    public function getMeToReview()
    {
        return $this->meToReview;
    }

    public function setMeToReview($meToReview)
    {
        $this->meToReview = $meToReview;

        return $this;
    }

    public function getHouses()
    {
        return $this->houses;
    }

    public function setHouses($houses)
    {
        $this->houses = $houses;

        return $this;
    }

    public function getReport()
    {
        return $this->report;
    }

    public function setReport($report)
    {
        $this->report = $report;
    }

    public function getProfilePicture()
    {
        return $this->profilePicture;
    }

    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture; 
    }
}