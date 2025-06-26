<?php


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;




#[ORM\Entity]
#[ORM\Table('position')]
class MPosition{
#[ORM\Id, ORM\GeneratedValue]
#[ORM\Column]
private int $id;

#[ORM\Column]
private string $description;

#[ORM\Column]
private string $address; // via e civico

#[ORM\Column]
private string $city;

#[ORM\Column]
private string $province;

#[ORM\Column]
private string $country;

#[ORM\Column(type: 'decimal', precision:11, scale:8, nullable:true)]
private ?float $longitude=null;

#[ORM\Column(type: 'decimal', precision:10,scale:8, nullable:true)]
private ?float $latitude=null;  //dont know if float is better

//foto private

#[ORM\ManyToOne(inversedBy:'houses')]
#[ORM\JoinColumn(name:'owner',referencedColumnName:'id')]
private Muser $owner;

#[ORM\OneToMany(targetEntity:Mpost::class, mappedBy:'house')]
private ?Collection $post=null;

#[ORM\OneToMany(targetEntity:Mphoto::class, mappedBy:'location')]
private ?Collection $photos =null;

#[ORM\Column]
private string $title;

private static $entity = 'Mposition';


public function getId(): int
{
    return $this->id;
}

public function getDescription(): string
{
    return $this->description;
}

public function getAddress(): string
{
    return $this->address;
}

public function getLongitude(): float
{
    return $this->longitude;
}

public function getLatitude(): float
{
    return $this->latitude;
}

public function setAddress(string $address): void
{
    $this->address = $address;
}

public function getOwner(): Muser
{
    return $this->owner;
}


public function getPosts(): array|Collection //cronologia riferita ad una casa di un utente
{
    return $this->post;
}



public function setDescription(string $description): void
{
    $this->description = $description;
}


public function setLongitude(float $longitude): void
{
    $this->longitude = $longitude;
}

public function setLatitude(float $latitude): void
{
    $this->latitude = $latitude;
}

public function __construct(string $address,string $description, string $city, string $province, string $country, Muser $owner, string $title)
    {
        $this->post = new ArrayCollection();
        $this->photos = new ArrayCollection();
        $this->address = $address;
        $this->description = $description;
        $this->city = $city;
        $this->province = $province;
        $this->country = $country;
        $this->owner = $owner;
        $this->title = $title;
        
    }

public function getPhotos(): array|Collection|null
{
return $this->photos;
}

public function setPhotos($photos): void
{
$this->photos = $photos;
}
public static function getEntity(): string
{
return self::$entity;
}

public function getCity(): string
{
return $this->city;
}

public function setCity($city): void
{
$this->city = $city;

}
public function getProvince(): string
{
return $this->province;
}


public function setProvince($province): void
{
$this->province = $province;

}

public function getCountry(): string
{
return $this->country;
}


public function setCountry($country): void
{
$this->country = $country;

}

public function addPhoto(Mphoto $photo): void
{
    if ($this->photos === null) {
        $this->photos = new ArrayCollection();
    }
    if (!$this->photos->contains($photo)) {
        $this->photos->add($photo);
        
        $photo->setLocation($this);
    }
}
public function getTitle()
{
return $this->title;
}
public function setTitle($title)
{
$this->title = $title;
}
}
?>