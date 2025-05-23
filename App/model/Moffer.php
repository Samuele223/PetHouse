<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

require_once 'stateoffer.php';

#[ORM\Entity]
#[ORM\Table('offer')]
class Moffer
{
#[ORM\Id, ORM\Column, ORM\GeneratedValue]
private int $id;

#[ORM\Column(enumType:stateoffer::class,name:'state')] //ok
private stateoffer $state;

#[ORM\Column(type:'datetime')]
private DateTime $dateofferin;

#[ORM\Column(type: 'datetime')]
private DateTime $dateofferout;

#[ORM\ManyToOne(inversedBy:'offers')]
#[ORM\JoinColumn(name:'post',referencedColumnName:'id')]
private Mpost $post;

#[ORM\OneToMany(targetEntity:'Mreview',mappedBy:'offer',)]
private ?Collection $review = null;

private static $entity = Moffer::class;

public function __construct(stateoffer $state, DateTime $dateofferin, DateTime $dateofferout, Mpost $post)
{
    $this->review = new ArrayCollection();
    $this->state = $state;
    $this->dateofferin = $dateofferin;
    $this->dateofferout = $dateofferout;
    $this->post = $post;

}

public function getId(): int
{
    return $this->id;
}

public function getState(): stateoffer
{
    return $this->state;
}



public function getDateofferin(): DateTime{
    return $this->dateofferin;
}

public function setDateofferin($dateofferin): void{
    $this->dateofferin = $dateofferin;
}

public function getDateofferout(): DateTime{
    return $this->dateofferout;
}

public function setDateofferout($dateofferout): void{
    $this->dateofferout = $dateofferout;
}

public function getPost(): Mpost
{
    return $this->post;
}

public function setPost($post): void
{
    $this->post = $post;
}
public static function getEntity(): string
{
    return self::$entity;
}
public function getReview(): array|Collection|null
{
return $this->review;
}

public function setReview($review): static
{
$this->review = $review;

return $this;
}

public function setState(StateOffer|string $state): void
    {
        if (is_string($state)) {
            $state = StateOffer::fromString($state);
        }
        $this->state = $state;
    }

//da vedere bene se funziona, mo famo la prova
/**
     * Accetta l'offerta: cambia stato, riserva le date sul post e persiste.
     */
    public function acceptOffer(): void
    {
  
}
}


?>