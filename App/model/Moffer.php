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