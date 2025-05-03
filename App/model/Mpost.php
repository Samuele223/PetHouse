<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('post')]
class Mpost
{
#[ORM\Column, ORM\GeneratedValue , ORM\Id]
private int $Id;

#[ORM\Column('Num_Report')]
private int $NumReport;

//private foto $foto; devo mette come attributo una foto non so come fare
#[ORM\Column]
private string $Description;

#[ORM\Column('Accepted_Pet')]
private string $AcceptedPet;

#[ORM\Column(type: 'decimal', precision:10, scale:8)]
private float $Price;

#[ORM\Column]
private string $title;

#[ORM\Column('More_Info')]
private string $MoreInfo;

#[ORM\Column(type: 'decimal', precision:11, scale:8)]
private string $longitude;

#[ORM\Column(type: 'decimal', precision:10,scale:8)]
private string $latitude;

#[ORM\Column('Date_in')]
private DateTime $DateIn;

#[ORM\Column('Date_out')]
private DateTime $Dateout;

#[ORM\ManyToOne(inversedBy:'AcceptedPost')]
private Muser $Costumer;

#[ORM\ManyToOne(inversedBy:'MyPost')]
private Muser $Seller;

}
?>