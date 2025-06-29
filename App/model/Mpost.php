<?php



use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

require_once 'acceptedPet.php';




#[ORM\Entity]
#[ORM\Table('post')]
class Mpost
{
#[ORM\Column]
private string $booked; //booked, finished, open
    

#[ORM\Column, ORM\GeneratedValue , ORM\Id]
private int $id;

#[ORM\Column('Num_Report', nullable: true)]
private ?int $numreport = null;

#[ORM\Column]
private string $description;

#[ORM\Column(name: 'accepted_pets', type: 'json')]
private array $acceptedPets = [];

#[ORM\Column(type: 'decimal', precision:10, scale:2)]
private float $price;

#[ORM\Column]
private string $title;

#[ORM\Column('More_Info')]
private string $moreinfo;

#[ORM\Column('date_in')]
private DateTime $datein;

#[ORM\Column('date_out')]
private DateTime $dateout;




public function __construct(string $desc, array $acceptedPets, float $price, string $title, string $info, Muser $seller, Mposition $house, DateTime $datein, DateTime $dateout)
{
    $this->reportreceived = new ArrayCollection();
    $this->offers = new ArrayCollection();
    $this->description = $desc;
    $this->addAcceptedPets($acceptedPets); 
    $this->price = $price;
    $this->title = $title;
    $this->moreinfo = $info;
    $this->seller = $seller;
    $this->house = $house;
    $this->datein = $datein;
    $this->dateout = $dateout;
    $this->booked = 'open'; 
}





#[ORM\ManyToOne(inversedBy:'MyPost')]
#[ORM\JoinColumn(name:'seller',referencedColumnName:'id')]
private Muser $seller;

#[ORM\OneToMany(targetEntity:Mreport::class, mappedBy:'postreported')]
private ?Collection $reportreceived = null;

#[ORM\ManyToOne(inversedBy:'post')]
#[ORM\JoinColumn(name:'house',referencedColumnName:'id')]
private Mposition $house;

#[ORM\OneToMany(targetEntity:Moffer::class, mappedBy:'post', cascade:['persist', 'remove'])]
private ?Collection $offers=null;

private static $entity = Mpost::class;







public function getId(): int
{
    return $this->id;
}

public function getNUmReport(): ?int
{
    return $this->numreport;
}

public function getDesc(): string
{
    return $this->description;
}


public function getPrice(): float
{
    return $this->price;
}

public function getTitle()
{
    return $this->title;
}

public function getMoreInfo(): string
{
    return $this->moreinfo;
}
public function getDateIn(): DateTime 
{
    return $this->datein;
}
public function getDateOut(): DateTime 
{
    return $this->dateout;
}


public function getSeller(): Muser
{
    return $this->seller;
}

public function getReport(): array|Collection
{
    return $this->reportreceived;
}

public function getHouse(): Mposition
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

public function setHouse(Mposition $house): void 
{
    $this->house = $house;
}

public function setSeller(Muser $seller): void 
{
    $this->seller = $seller;
}


  /**
     * Restituisce la lista di AcceptedPet.
     * @return acceptedPet[]
     */
    public function getAcceptedPets(): array
    {
        return $this->acceptedPets;
    }

    /**
     * Imposta la lista di AcceptedPet. Accetta array di enum o stringhe.
     * @param acceptedPet[]|string[] $acceptedPets
     */
/**
 * @param array<string,int> $pets  Associative: [ 'DOG'=>2, 'CAT'=>1, ... ]
 */
public function addAcceptedPets(array $pets): void
{
    $counts = [];
    foreach ($pets as $petKey => $count) {
        // il form invia chiavi in uppercase, es. 'DOG'
        if (!is_string($petKey) || acceptedPet::tryFrom($petKey) === null) {
            throw new \Exception("Invalid pet type: $petKey");
        }
        // forza il valore intero, min 0
        $n = max(0, (int)$count);
        if ($n > 0) {
            $counts[$petKey] = $n;
        }
    }
    
    $this->acceptedPets = $counts;
}


    /**
     * Rimuove un AcceptedPet dalla lista.
     */
    public function removeAcceptedPet(array $pet): void 
    {

    }

 

public function setdatein(DateTime $datein): void{
    $this->datein = $datein;
}

public function setdateout(DateTime $dateout): void{
    $this->dateout = $dateout;
}

public static function getEntity(): string
{
return self::$entity;
}   

/**
 * Get the value of booked
 */ 
public function getBooked()
{
return $this->booked;
}

public function setBooked(string $booked)
{
$this->booked = $booked;

return $this;
}

public function getDescription(): string {
    return $this->description;
}

}

