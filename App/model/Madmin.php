<?php

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table('admin')]

class Madmin
{
#[ORM\Column, ORM\GeneratedValue, ORM\Id]
private int $id;

#[ORM\Column]
private string $password;

#[ORM\Column]
private string $email;

private static $entity = Madmin::class;

public function getId(): int //non  so se deve essere pubblica come funzione perche se ci sono piu admin aggiornamento andrea, ho messo public perchè così pure agora ma soprattutto perchè fasmin se no non mi pijava i metodi
// allore dave essere spostata la chiave dell' admin che rimuove o aggiunge un post facciamo per ora che c è solo un admin 
{
    return $this->id;
}
public function getPassword(): string  //metto private su tutti i metodi sensibili
{
    return $this->password;
}
public function getEmail(): string
{
    return $this->email;
}
public function setId(int $id): void
{
    $this->id = $id;
}
public function setPassword(string $password): void
{
    $this->password = $password;
}
public function setEmail(string $email): void
{
    $this->email = $email;
}

public static function getEntity()
{
return self::$entity;
}
}
?>