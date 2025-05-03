<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('post')]
class Mpost
{
#[ORM\Column, ORM\GeneratedValue , ORM\Id]
private int $Id;

#[ORM\Column('Id_Seller')]
private int $IdSeller;

#[ORM\Column('Id_Costumer')]
private int $IdCostumer;

#[ORM\Column('Num_Report')]
private int $NumReport;

//private foto $foto; devo mette come attributo una foto non so come fare
#[ORM\Column]
private string $Description;

#[ORM\Column('Accepted_Pet')]
private string $AcceptedPet;

#[ORM\Column]
private float $price;

#[ORM\Column]
private string $title;

#[ORM\Column('More_Info')]
private string $MoreInfo;


}
?>