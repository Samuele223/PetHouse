<?php

use Doctrine\DBAL\Types\IntegerType;
use Doctrine\ORM\Mapping as ORM;
require_once 'rating.php';

#[ORM\Entity]
#[ORM\Table('review')]
class Mreview
{
#[ORM\Column, ORM\GeneratedValue, ORM\Id]
private int $Id; 

#[ORM\Column('Id_Reviewer')]
private int $IdReviewer;

#[ORM\Column('Id_Reviewed')]
private int $IdReviewed;

#[ORM\Column]
private string $Description;

#[ORM\Column(type:'INT')] //non so se è giusto INT
private rating $rating;
}
?>