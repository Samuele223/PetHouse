<?php

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

require_once 'rating.php';

#[ORM\Entity]
#[ORM\Table('review')]
class Mreview
{
#[ORM\Column, ORM\GeneratedValue, ORM\Id]
private int $id; 


#[ORM\Column]
private string $description;

#[ORM\Column(enumType: rating::class)] 
private rating $rating;

#[ORM\ManyToOne(inversedBy:'MeToReview')]
#[ORM\JoinColumn(name:'reviewer',referencedColumnName:'id')]
private Muser $reviewer;

#[ORM\ManyToOne(inversedBy:'ReviewToMe')]
#[ORM\JoinColumn(name:'reviewed',referencedColumnName:'id')]
private Muser $reviewed;


#[ORM\ManyToOne(inversedBy:'review')]
#[ORM\JoinColumn(name:'id_offer',referencedColumnName:'id')]
private Moffer $offer;

private static string $entity = Mreview::class;

public function getId(): int
{
    return $this->id;
}
public function getDesc(): string
{
    return $this->description;
}
public function getRating(): rating
{
    return $this->rating;
}
public function getReviewer(): Muser
{
    return $this->reviewer;
}
public function getreviewed(): Muser
{
    return $this->reviewed;
}
public function getOfferReviewed(): Moffer
{
    return $this->offer;
}
public function setDesc(string $desc): void
{
    $this->description = $desc;
}
public function setRating(rating $rating): void
{
    $this->rating = $rating;
}
public function __construct(string $desc, rating $rating)
{
    $this->description = $desc;
    $this->rating = $rating;
}
public static function getEntity(): string
{
return self::$entity;
}
}
?>