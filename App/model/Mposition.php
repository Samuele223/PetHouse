<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table('position')]
class MPosition{
#[ORM\Id, ORM\GeneratedValue]
#[ORM\Column]
private int $id;

#[ORM\Column]
private string $title;

#[ORM\Column]
private string $desc;

#[ORM\Column]
private string $address;

#[ORM\Column(type: 'decimal', precision:11, scale:8)]
private string $longitude;

#[ORM\Column(type: 'decimal', precision:10,scale:8)]
private string $latitude;  //dont know if float is better

//foto private

#[ORM\ManyToOne(inversedBy:'houses')]
#[ORM\JoinColumn(name:'owner',referencedColumnName:'id')]
private Muser $owner;

#[ORM\OneToMany(targetEntity:Mpost::class, mappedBy:'house')]
private Collection $post;

public function __construct()
    {
        $this->post = new ArrayCollection();
    }
}
?>