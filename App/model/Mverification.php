<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'verification')]
class Mverification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $requestDate;

    #[ORM\Column(type: 'boolean')]
    private bool $approved = false;

    #[ORM\OneToMany(targetEntity: Mphoto::class, mappedBy: 'verification', cascade: ['persist', 'remove'])]
    private Collection $documents;

    #[ORM\OneToOne(inversedBy: 'verification')]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: false)]
    private Muser $user;

    private static string $entity = Mverification::class;

    public function __construct(Muser $user, ?string $description = null)
    {
        $this->user = $user;
        $this->description = $description;
        $this->requestDate = new \DateTime();
        $this->documents = new ArrayCollection();
    }

    public static function getEntity(): string
    {
        return self::$entity;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getRequestDate(): \DateTime
    {
        return $this->requestDate;
    }

    public function isApproved(): bool
    {
        return $this->approved;
    }

    public function setApproved(bool $approved): self
    {
        $this->approved = $approved;
        return $this;
    }

    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Mphoto $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setVerification($this);
        }
        return $this;
    }

    public function removeDocument(Mphoto $document): self
    {
        if ($this->documents->removeElement($document)) {
            // Imposta a null il lato proprietario
            if ($document->getVerification() === $this) {
                $document->setVerification(null);
            }
        }
        return $this;
    }

    public function getUser(): Muser
    {
        return $this->user;
    }

    public function setUser(Muser $user): self
    {
        $this->user = $user;
        return $this;
    }

}