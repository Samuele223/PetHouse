<?php
//DA SISTEMARE, non mi trova acceptedPet quindi da errore + fare verifica su prova, vedere anche per quanto riguarda la gestione delle date automatica che è UNTESTED


use App\model\acceptedPet;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;



#[ORM\Entity]
#[ORM\Table('post')]
class Mpost
{

#[ORM\Column, ORM\GeneratedValue , ORM\Id]
private int $id;

#[ORM\Column('Num_Report', nullable: true)]
private ?int $numreport = null;

#[ORM\Column]
private string $description;

 #[ORM\Column(type: 'json')]
    private array $acceptedPets;

#[ORM\Column(type: 'decimal', precision:2, scale:4)]
private float $price;

#[ORM\Column]
private string $title;

#[ORM\Column('More_Info')]
private string $moreinfo;

#[ORM\Column('date_ranges')]
private Array $date=[];

// 2) Nel costruttore inizializzo $this->date
public function __construct(string $desc, array|string $acceptedPets, float $price, string $title, string $info, Muser $seller, MPosition $house)
{
    $this->reportreceived = new ArrayCollection();
    $this->offers = new ArrayCollection();
    $this->description = $desc;
     $this->setAcceptedPets($acceptedPets);
    $this->price = $price;
    $this->title = $title;
    $this->moreinfo = $info;
    $this->seller = $seller;
    $this->house = $house;
    $this->date = []; // inizializzo le date
}





#[ORM\ManyToOne(inversedBy:'MyPost')]
#[ORM\JoinColumn(name:'seller',referencedColumnName:'id')]
private Muser $seller;

#[ORM\OneToMany(targetEntity:Mreport::class, mappedBy:'postreported', nullable:true)]
private ?Collection $reportreceived = null;

#[ORM\ManyToOne(inversedBy:'post')]
#[ORM\JoinColumn(name:'house',referencedColumnName:'id')]
private MPosition $house;

#[ORM\OneToMany(targetEntity:Moffer::class, mappedBy:'post', nullable:true)]
private ?Collection $offers=null;

private static $entity = Mpost::class;





// 3) Metodo per accettare una prenotazione e "spezzare" le disponibilità
public function acceptReservation(string $bookStart, string $bookEnd): void
{
    $dtBookStart = new DateTime($bookStart);
    $dtBookEnd = new DateTime($bookEnd);

    if ($dtBookEnd < $dtBookStart) {
        throw new InvalidArgumentException("La data di fine prenotazione deve essere successiva a quella di inizio.");
    }

    $newRanges = [];
    foreach ($this->date as $start => $end) {
        $dtStart = new DateTime($start);
        $dtEnd = new DateTime($end);

        // Se non c'è sovrapposizione, mantengo il range originale
        if ($dtBookEnd <= $dtStart || $dtBookStart >= $dtEnd) {
            $newRanges[$start] = $end;
            continue;
        }

        // Se la prenotazione inizia dopo l'inizio del range, creo un range left
        if ($dtBookStart > $dtStart) {
            $newRanges[$start] = $dtBookStart->format('Y-m-d');
        }
        // Se la prenotazione finisce prima della fine del range, creo un range right
        if ($dtBookEnd < $dtEnd) {
            $newRanges[$dtBookEnd->format('Y-m-d')] = $end;
        }
        // Altrimenti, la parte centrale è occupata e non viene reinserita
    }

    $this->date = $newRanges;
}

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
    public function setAcceptedPets(array|string $acceptedPets): void
    {
        $pets = is_string($acceptedPets)
            ? array_map('trim', explode(',', $acceptedPets))
            : $acceptedPets;

        $this->acceptedPets = array_map(function($pet) {
            if (is_string($pet)) {
                $enum = acceptedPet::tryFrom(strtoupper($pet));
                if (!$enum) {
                    throw new \InvalidArgumentException("Valore non valido per acceptedPet: $pet");
                }
                return $enum;
            }
            if ($pet instanceof acceptedPet) {
                return $pet;
            }
            throw new \InvalidArgumentException("Tipo non valido in acceptedPets");
        }, $pets);
    }

    /**
     * Aggiunge un AcceptedPet alla lista, se non già presente.
     */
    public function addAcceptedPet(acceptedPet|string $pet): void
    {
        $enum = is_string($pet)
            ? (acceptedPet::tryFrom(strtoupper($pet)) ?? throw new \InvalidArgumentException("Valore non valido per acceptedPet: $pet"))
            : $pet;

        if (!in_array($enum, $this->acceptedPets, true)) {
            $this->acceptedPets[] = $enum;
        }
    }

    /**
     * Rimuove un AcceptedPet dalla lista.
     */
    public function removeAcceptedPet(acceptedPet|string $pet): void
    {
        $enum = is_string($pet)
            ? (acceptedPet::tryFrom(strtoupper($pet)) ?? throw new \InvalidArgumentException("Valore non valido per acceptedPet: $pet"))
            : $pet;

        $this->acceptedPets = array_filter(
            $this->acceptedPets,
            fn($p) => $p !== $enum
        );
    }



// 4) (facoltativo) rinomino setDate in addAvailability per chiarezza
public function addAvailability(string $inizio, string $fine): void
{
    $dtInizio = new DateTime($inizio);
    $dtFine = new DateTime($fine);

    if ($dtFine < $dtInizio) {
        throw new InvalidArgumentException("La data di fine deve essere successiva a quella di inizio.");
    }

    $this->date[$dtInizio->format('Y-m-d')] = $dtFine->format('Y-m-d');
}


public static function getEntity(): string
{
return self::$entity;
}   
}
?>