<?php

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table('admin')]

class Madmin
{
    #[ORM\Column,ORM\GeneratedValue]
    private int $Id;

    #[ORM\Column]
    private string $Password;

    #[ORM\Column]
    private string $Email;

}
?>