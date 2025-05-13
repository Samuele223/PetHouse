<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('post')]
class Mpost
{

#[ORM\Column, ORM\GeneratedValue , ORM\Id]
private int $id;

#[ORM\Column('Num_Report')]
private int $numreport;

#[ORM\Column]
private string $description;

#[ORM\Column('Accepted_Pet')]
private string $acceptedpet;

#[ORM\Column(type: 'decimal', precision:10, scale:8)]
private float $price;

#[ORM\Column]
private string $title;

#[ORM\Column('More_Info')]
private string $moreinfo;

#[ORM\Column('date_ranges')]
private Array $date;


#[ORM\ManyToOne(inversedBy:'MyPost')]
#[ORM\JoinColumn(name:'seller',referencedColumnName:'id')]
private Muser $seller;

#[ORM\OneToMany(targetEntity:Mreport::class, mappedBy:'postreported')]
private Collection $reportreceived;

#[ORM\ManyToOne(inversedBy:'post')]
#[ORM\JoinColumn(name:'house',referencedColumnName:'id')]
private MPosition $house;

#[ORM\OneToMany(targetEntity:Moffer::class, mappedBy:'post')]
private Collection $offers;

private static $entity = Mpost::class;


public function getId(): int
{
    return $this->id;
}

public function getNUmReport(): int
{
    return $this->numreport;
}

public function getDesc(): string
{
    return $this->description;
}

public function getAcceptedPet(): string
{
    return $this->acceptedpet;
}

public function getPrice(): float
{
    return $this->price;
}

public function getTitle(): string
{
    return $this->title;
}

public function getMoreInfo(): string
{
    return $this->moreinfo;
}
public function getDate(): array
{
    return $this->date;
}

public function getSeller(): Muser
{
    return $this->seller;
}

public function getReport(): array|Collection
{
    return $this->reportreceived;
}

public function getHouse(): MPosition
{
    return $this->house;
}

public function getOffers(): array|Collection
{
    return $this->offers;
}
public function setNumReport(int $numreport): void
{
    $this->numreport = $numreport;
}
public function setDesc(string $desc): void
{
    $this->description = $desc;
}

public function setAcceptedPet(string $pet): void
{
    $this->acceptedpet = $pet;
}

public function setPrice(float $price): void
{
    $this->price = $price;
}

public function setTitle(string $title): void
{
    $this->title = $title;
}

public function setMoreInfo(string $info): void
{
    $this->moreinfo = $info;
}
public function setDate(string $inizio, string $fine): void { //la data deve essere nel formato giusto 'Y-m-d'
        // Validazione semplice (opzionale ma consigliata)
        $dtInizio = new DateTime($inizio);
        $dtFine = new DateTime($fine);

        if ($dtFine < $dtInizio) {
            throw new InvalidArgumentException("La data di fine deve essere successiva a quella di inizio.");
        }

        // Aggiunge l'intervallo (sovrascrive se la stessa data d'inizio è già presente)
        $this->date[$inizio] = $fine;
    }

public function __construct(string $desc, string $accepted, float $price, string $title, string $info) //date mancano al costruttore ci pensa andrea con la a piccola
    {
        $this->reportreceived = new ArrayCollection();
        $this->offers = new ArrayCollection();
        $this->description = $desc;
        $this->acceptedpet = $accepted;
        $this->price = $price;
        $this->title = $title;
        $this->moreinfo = $info;
    }
public static function getEntity(): string
{
return self::$entity;
}   
}
?>