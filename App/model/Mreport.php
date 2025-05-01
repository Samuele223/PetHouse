<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('report')]
class Mreport
{
#[ORM\Column, ORM\GeneratedValue]
private int $Id;
#[ORM\Column('Id_Reporter')]
private int $IdReporter;
#[ORM\Column('Id_Reported')]
private int $IdReported;
#[ORM\Column]
private string $description;

}
?>