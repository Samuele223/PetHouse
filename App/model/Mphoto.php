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

#[ORM\Column(nullable: true)]
private ?string $name = null;

#[ORM\Column]
private int $size;

#[ORM\Column]
private string $types;

#[ORM\Column(name:'image_data',type:"blob")]
private $imageData;

private static $entity = 'Mphoto';

#[ORM\ManyToOne(inversedBy:"photos")]
#[ORM\JoinColumn(name:"id_Position", referencedColumnName:"id")]
private ?Mposition $location=null;

#[ORM\OneToOne(mappedBy:'profilePicture')]
private ?Muser $user=null;

#[ORM\ManyToOne(inversedBy:"documents")]
#[ORM\JoinColumn(name:"verification_id", referencedColumnName:"id", nullable:true)]
private ?Mverification $verification=null;

public function __construct($dati, $types)
{
    $this->imageData = $dati;
    $this->types = $types;
    $this->size = strlen($dati);
    $this->name = 'photo_' . time() . '_' . uniqid();
}

public static function getEntity(): string
{
    return self::$entity;
}


public function getId(): int
{
    return $this->id;
}

public function getName(): ?string
{
    return $this->name;
}

public function setName(?string $name): self
{
    $this->name = $name;
    return $this;
}

public function getSize(): int
{
    return $this->size;
}

public function getType(): string
{
    return $this->types;
}

public function getImageData(): mixed
{
    return $this->imageData;
}

public function getMimeType(): string
    {
        $map = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        ];
        return $map[$this->types] ?? 'application/octet-stream';
    }


public function setLocation(Mposition $location): void
{
    $this->location = $location;
}

public function getLocation(): ?Mposition
{
    return $this->location;
}

public function getUser(): Muser|null
{
return $this->user;
}

public function setUser($user): static
{
$this->user = $user;

return $this;
}

public function getVerification(): ?Mverification
{
    return $this->verification;
}

public function setVerification(?Mverification $verification): self
{
    $this->verification = $verification;
    return $this;
}
}
?>