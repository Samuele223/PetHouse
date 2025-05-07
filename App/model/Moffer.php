<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;

require_once 'stateoffer.php';

#[ORM\Entity]
#[ORM\Table('offer')]
class Moffer
{
#[ORM\Id, ORM\Column, ORM\GeneratedValue]
private int $id;

#[ORM\Column(enumType:stateoffer::class)]
private stateoffer $state;

#[ORM\Column]
private DateTime $dateofferin;

#[ORM\Column]
private DateTime $dareofferout;

#[ORM\ManyToOne(inversedBy:'offers')]
#[ORM\JoinColumn(name:'post',referencedColumnName:'id')]
private Mpost $post;

#[ORM\OneToMany(targetEntity:'Mreview',mappedBy:'offer')]
private Collection $review;

public function __construct()
{
    $this->review = new ArrayCollection();
}

public function getId()
{
    return $this->id;
}

public function setId($id)
{
    $this->id = $id;
}

public function getState()
{
    return $this->state;
}

public function setState($state)
{
    $this->state = $state;
}

}


?>