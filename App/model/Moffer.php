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

#[ORM\Column(enumType:stateoffer::class)]
private stateoffer $state;

#[ORM\Column]
private DateTime $dateofferin;

#[ORM\Column]
private DateTime $dateofferout;

#[ORM\ManyToOne(inversedBy:'offers')]
#[ORM\JoinColumn(name:'post',referencedColumnName:'id')]
private Mpost $post;

#[ORM\OneToMany(targetEntity:'Mreview',mappedBy:'offer', nullable: true)]
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

public function getId()
{
    return $this->id;
}

public function getState()
{
    return $this->state;
}



public function getDateofferin(){
    return $this->dateofferin;
}

public function setDateofferin($dateofferin){
    $this->dateofferin = $dateofferin;
}

public function getDateofferout(){
    return $this->dateofferout;
}

public function setDateofferout($dateofferout){
    $this->dateofferout = $dateofferout;
}

public function getPost()
{
    return $this->post;
}

public function setPost($post)
{
    $this->post = $post;
}
public static function getEntity(): string
{
    return self::$entity;
}
public function getReview()
{
return $this->review;
}

public function setReview($review)
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
        // 1) Cambio stato in ACCEPTED
        $this->setState(StateOffer::ACCEPTED);

        // 2) Split disponibilità sul post (prenota l'intervallo)
        $this->getPost()->acceptReservation(
            $this->getDateOfferIn()->format('Y-m-d'),
            $this->getDateOfferOut()->format('Y-m-d')
        );
    // 3) Recupero l’EntityManager dal singleton
    $em = FEntityManager::getEntityManager();

    // 4) “Persist” (necessario solo se $offer è nuovo o detached)
    $em->persist($this);

    // 5) “Flush” scrive realmente sul DB
    $em->flush();
}
}


?>