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

private function getId(): int //non  so se deve essere pubblica come funzione perche se ci sono piu admin 
// allore dave essere spostata la chiave dell' admin che rimuove o aggiunge un post facciamo per ora che c è solo un admin 
{
    return $this->id;
}
private function getPassword(): string  //metto private su tutti i metodi sensibili
{
    return $this->password;
}
private function getEmail(): string
{
    return $this->email;
}
private function setId(int $id): void
{
    $this->id = $id;
}
private function setPassword(string $password): void
{
    $this->password = $password;
}
private function setEmail(string $email): void
{
    $this->email = $email;
}


}
?>