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

#[ORM\Column(name: 'required_Pets', type: 'json')]
private array $requiredPets = [];

#[ORM\Column(type: 'datetime')]
private DateTime $dateofferout;

#[ORM\ManyToOne(inversedBy:'offers')]
#[ORM\JoinColumn(name:'post',referencedColumnName:'id')]
private Mpost $post;

#[ORM\OneToMany(targetEntity:'Mreview',mappedBy:'offer',)]
private ?Collection $review = null;

#[ORM\ManyToOne(inversedBy:'listOfOffers')]
#[ORM\JoinColumn(name:'client',referencedColumnName:'id')]
private Muser $client;

private static $entity = Moffer::class;

public function __construct(DateTime $dateofferin, DateTime $dateofferout, Mpost $post, array $requiredPets, Muser $client)
{
    $this->client = $client;
    $this->review = new ArrayCollection();
    $this->state = stateoffer::PENDING;
    $this->dateofferin = $dateofferin;
    $this->dateofferout = $dateofferout;
    $this->post = $post;
    $this->requiredPets = $requiredPets;

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

    public function acceptOffer(): void
    {
        $this->state = stateoffer::ACCEPTED;
    }
    public function denyOffer()
    {
        $this->state = stateoffer::DENIED;
    }

public function getRequiredPet()
{
return $this->requiredPets;
}


public function setRequiredPet(array $pets)
{
    foreach($pets as $pet){
        if (acceptedPet::tryFrom(strtoupper( $pet))){
            if (isset($this->acceptedPets[$pet])) {
                $this->requiredPets[$pet]++;
            } else {
                $this->requiredPets[$pet] = 1;
            }
        }
        else{ 
            throw new Exception("argument miss matched");}
        }
}

public function getClient()
{
return $this->client;
}

public function setClient($client)
{
$this->client = $client;

}
}


?>