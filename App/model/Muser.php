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

    #[ORM\Column(type: 'blob')]
    private $immagine;

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


    public function __construct()
    { 
        $this->myPost = new ArrayCollection();
        $this->reviewToMe = new ArrayCollection();
        $this->meToReview = new ArrayCollection();
        $this->houses = new ArrayCollection();
        $this->report = new ArrayCollection();
        //$this->password = password_hash();da finire funzione figa
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
     *
     * @return  self
     */ 
    public function setId($id)
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
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

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
     *
     * @return  self
     */ 
    public function setEmail($email)
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
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of verified
     */ 
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Set the value of verified
     *
     * @return  self
     */ 
    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * Get the value of immagine
     */ 
    public function getImmagine()
    {
        return $this->immagine;
    }

    /**
     * Set the value of immagine
     *
     * @return  self
     */ 
    public function setImmagine($immagine)
    {
        $this->immagine = $immagine;

        return $this;
    }

    /**
     * Get the value of rating
     */ 
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @return  self
     */ 
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of myPost
     */ 
    public function getMyPost()
    {
        return $this->myPost;
    }

    /**
     * Set the value of myPost
     *
     * @return  self
     */ 
    public function setMyPost($myPost)
    {
        $this->myPost = $myPost;

        return $this;
    }

    /**
     * Get the value of reviewToMe
     */ 
    public function getReviewToMe()
    {
        return $this->reviewToMe;
    }

    /**
     * Set the value of reviewToMe
     *
     * @return  self
     */ 
    public function setReviewToMe($reviewToMe)
    {
        $this->reviewToMe = $reviewToMe;

        return $this;
    }

    /**
     * Get the value of meToReview
     */ 
    public function getMeToReview()
    {
        return $this->meToReview;
    }

    /**
     * Set the value of meToReview
     *
     * @return  self
     */ 
    public function setMeToReview($meToReview)
    {
        $this->meToReview = $meToReview;

        return $this;
    }

    /**
     * Get the value of houses
     */ 
    public function getHouses()
    {
        return $this->houses;
    }

    /**
     * Set the value of houses
     *
     * @return  self
     */ 
    public function setHouses($houses)
    {
        $this->houses = $houses;

        return $this;
    }

    /**
     * Get the value of report
     */ 
    public function getReport()
    {
        return $this->report;
    }

    /**
     * Set the value of report
     *
     * @return  self
     */ 
    public function setReport($report)
    {
        $this->report = $report;

        return $this;
    }
}