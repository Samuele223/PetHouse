<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;

require_once 'rating.php';
#[ORM\Entity]
#[Table('user')]
class Muser
{
#[ORM\Column]
#[ORM\GeneratedValue, ORM\Id]
private int $Id;

#[ORM\Column]
private string $name;

//private foto $foto; non so ancora come si fa

#[ORM\Column]
private string $Email;

#[ORM\Column]
private string $Password;

#[ORM\Column]
private bool $Verified;
#[ORM\Column]
private rating $Rating;

#[ORM\Column]
private int $tel;
}
?>