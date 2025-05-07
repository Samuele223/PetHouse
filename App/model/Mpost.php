<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('post')]
class Mpost
{
#[ORM\Column, ORM\GeneratedValue , ORM\Id]
private int $id;

#[ORM\Column('Num_Report')]
private int $NumReport;

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

#[ORM\Column('Date_in')]
private DateTime $DateIn;

#[ORM\Column('Date_out')]
private DateTime $Dateout; //da implementare gli intervalli date


#[ORM\ManyToOne(inversedBy:'MyPost')]
#[ORM\JoinColumn(name:'seller',referencedColumnName:'id')]
private Muser $Seller;

#[ORM\OneToMany(targetEntity:Mreport::class, mappedBy:'postreported')]
private Collection $reportreceived;

#[ORM\ManyToOne(inversedBy:'post')]
#[ORM\JoinColumn(name:'house',referencedColumnName:'id')]
private MPosition $house;

#[ORM\OneToMany(targetEntity:Moffer::class, mappedBy:'post')]
private Collection $offers;

public function __construct()
    {
        $this->reportreceived = new ArrayCollection();
        $this->offers = new ArrayCollection();
    }   
}
?>