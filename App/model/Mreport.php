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
private string $description;

#[ORM\ManyToOne(inversedBy:'report')]
#[ORM\JoinColumn(name:'reporter',referencedColumnName:'id')]
private Muser $reporter;

#[ORM\ManyToOne(inversedBy:'reportreceived')]
#[ORM\JoinColumn(name:'postreported',referencedColumnName:'id')]
private Mpost $postreported;

public function getId(): int
{
    return $this->id;
}
public function getDesc(): string
{
    return $this->description;
}
public function getReporter(): Muser
{
    return $this->reporter;
}
public function getPostReported(): Mpost
{
    return $this->postreported;
}
public function setDesc(string $desc): void
{
    $this->description = $desc;
}
public function __construct(string $desc)
{
    $this->description = $desc;
}

}
?>