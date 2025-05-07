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

}
?>