<?php

use Doctrine\DBAL\Types\BlobType;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table('photo')]

class Mphoto{

#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private int $id;

#[ORM\Column]
private string $name;

#[ORM\Column]
private int $size;

#[ORM\Column]
private string $types;

#[ORM\Column(name:'image_data',type:"blob")]
private string $imageData; //non so se è giusto salvare cosi un blob con doctrine poi vedo bene

private static $entity = Mphoto::class;

#[ORM\ManyToOne(inversedBy:"photos")]
#[ORM\JoinColumn(name:"id_Position", referencedColumnName:"id")]
private mposition $location;

#[ORM\OneToOne(mappedBy:'profilePicture')]
private Muser $user;






public function __construct($name, $size, $type, $imageData){
    $this->name = $name;
    $this->size = $size;
    $this->types = $type;
    $this->imageData = $imageData;
}

public static function getEntity(): string
{
    return self::$entity;
}


public function getId(): int
{
    return $this->id;
}

public function getName(): string
{
    return $this->name;
}

public function getSize(): int
{
    return $this->size;
}

public function getType(): string
{
    return $this->types;
}

public function getImageData(): string
{
    return $this->imageData;
}

public function getEncodedData(): string
{
    if(is_resource($this->imageData)){
        $data = stream_get_contents($this->imageData); //andre vedi sta cosa come funziona
        return base64_encode($data);
    }else{
        return base64_encode($this->imageData);
    }
    
}

public function setLocation(Mposition $location): void
{
    $this->location = $location;
}

public function getLocation(): ?MPosition
{
    return $this->location;
}
}
?>