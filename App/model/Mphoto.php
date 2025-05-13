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
#[ORM\JoinColumn(name:"id_Position", referencedColumnName:"id", nullable: true)]
private ?Mposition $location=null;

#[ORM\OneToOne(mappedBy:'profilePicture', nullable:true)]
private ?Muser $user=null;






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



public function setLocation(Mposition $location): void
{
    $this->location = $location;
}

public function getLocation(): ?MPosition
{
    return $this->location;
}

public function getUser()
{
return $this->user;
}

public function setUser($user)
{
$this->user = $user;

return $this;
}
}
?>