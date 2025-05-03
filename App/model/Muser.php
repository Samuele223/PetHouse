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
private string $name;

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
private int $tel;

#[ORM\Column(type: 'decimal', precision:11, scale:8)]
private float $longitude;

#[ORM\Column(type: 'decimal', precision:10, scale:8)]
private float $latitude;

#[OneToMany(targetEntity:Mpost::class)]
private Collection $AcceptedPost;

#[OneToMany(targetEntity:Mpost::class)]
private Collection $MyPost;

public function __construct()
{
    $this->MyPost = new ArrayCollection(); //da rivedere il costruttore
    $this->AcceptedPost = new ArrayCollection();
}
}

?>