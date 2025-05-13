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

private static string $entity = Mreport::class;

public function getId(): int
{
    return $this->id;
}
public function getDescription(): string
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
public function setDescription(string $description): void
{
    $this->description = $description;
}
public function __construct(string $description, Muser $muser, Mpost $mpost)
{
    $this->description = $description;
    $this->postreported = $mpost;
    $this->reporter = $muser;
}
public static function getEntity(): string
{
return self::$entity;
}
}
?>