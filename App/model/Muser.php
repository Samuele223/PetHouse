<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

require_once 'rating.php';


#[ORM\Entity]
#[Table('user')]
class Muser
{
#[ORM\Column]
#[ORM\GeneratedValue, ORM\Id]
private int $Id;

#[ORM\Column]
private string $Name;

//private foto $foto; non so ancora come si fa

#[ORM\Column]
private string $Email;

#[ORM\Column]
private string $Password;

#[ORM\Column]
private bool $Verified;
#[ORM\Column(enumType: rating::class)]
private rating $Rating;

#[ORM\Column]
private int $Tel;

#[ORM\Column(type: 'decimal', precision:11, scale:8)]
private float $Longitude;

#[ORM\Column(type: 'decimal', precision:10, scale:8)]
private float $Latitude;

#[OneToMany(targetEntity:Mpost::class, mappedBy:'Costumer')]
private Collection $AcceptedPost;

#[OneToMany(targetEntity:Mpost::class, mappedBy:'Seller')]
private Collection $MyPost;

public function __construct()
{
    $this->MyPost = new ArrayCollection(); //da rivedere il costruttore
    $this->AcceptedPost = new ArrayCollection();
}

#[ORM\OneToMany(targetEntity:Mreview::class,mappedBy:'Reviewed')]
private Collection $ReviewToMe; // recenzioni che mi hanno fatto

#[ORM\OneToMany(targetEntity:Mreview::class,mappedBy:'Reviewer')]
private Collection $MeToReview; //recensioni fatte da me

}

?>