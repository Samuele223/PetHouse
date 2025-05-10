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
private string $title;

#[ORM\Column]
private string $desc;

#[ORM\Column]
private string $address;

#[ORM\Column(type: 'decimal', precision:11, scale:8)]
private float $longitude;

#[ORM\Column(type: 'decimal', precision:10,scale:8)]
private float $latitude;  //dont know if float is better

//foto private

#[ORM\ManyToOne(inversedBy:'houses')]
#[ORM\JoinColumn(name:'owner',referencedColumnName:'id')]
private Muser $owner;

#[ORM\OneToMany(targetEntity:Mpost::class, mappedBy:'house')]
private Collection $post;

#[ORM\OneToMany(targetEntity:Mphoto::class, mappedBy:'location')]
private Collection $photos;

public function getId(): int
{
    return $this->id;
}

public function getTitle(): string
{
    return $this->title;
}

public function getDesc(): string
{
    return $this->desc;
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

public function getOwner(): Muser
{
    return $this->owner;
}


public function getPosts(): array|Collection //cronologia riferita ad una casa di un utente
{
    return $this->post;
}


public function setTitle(string $title)
{
    $this->title = $title;
}

public function setDesc(string $desc)
{
    $this->desc = $desc;
}

public function setAddre(string $addres)
{
    $this->address = $addres;
}

public function setLongitude(float $longitude)
{
    $this->longitude = $longitude;
}

public function setLatitude(float $latitude)
{
    $this->latitude = $latitude;
}

public function __construct(string $address,string $title,string $desc)
    {
        $this->post = new ArrayCollection();
        $this->photos = new ArrayCollection();
        $this->address = $address;
        $this->title = $title;
        $this->desc = $desc;
        

    }

public function getPhotos()
{
return $this->photos;
}

public function setPhotos($photos)
{
$this->photos = $photos;
}
}
?>