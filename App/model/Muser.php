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
}