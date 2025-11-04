<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
#[ApiResource]
#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    /**
     * @var Collection<int, Authors>
     */
    #[ORM\ManyToMany(targetEntity: Authors::class, inversedBy: 'books')]
    private Collection $Books;

    public function __construct()
    {
        $this->Books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    /**
     * @return Collection<int, Authors>
     */
    public function getBooks(): Collection
    {
        return $this->Books;
    }

    public function addBook(Authors $book): static
    {
        if (!$this->Books->contains($book)) {
            $this->Books->add($book);
        }

        return $this;
    }

    public function removeBook(Authors $book): static
    {
        $this->Books->removeElement($book);

        return $this;
    }
}
