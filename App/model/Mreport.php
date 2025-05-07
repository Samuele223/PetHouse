<?php

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table('report')]
class Mreport
{

#[ORM\Column, ORM\GeneratedValue]
#[ORM\Id]
private int $id;

#[ORM\Column]
private string $Description;

#[ORM\ManyToOne(inversedBy:'report')]
#[ORM\JoinColumn(name:'reporter',referencedColumnName:'id')]
private Muser $reporter;

#[ORM\ManyToOne(inversedBy:'reportreceived')]
#[ORM\JoinColumn(name:'postreported',referencedColumnName:'id')]
private Mpost $postreported;

}
?>