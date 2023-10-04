<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: BooksRepository::class)]
class Books
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\ManyToOne(inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MyBooks $myBooks = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getMyBooks(): ?MyBooks
    {
        return $this->myBooks;
    }

    public function setMyBooks(?MyBooks $myBooks): static
    {
        $this->myBooks = $myBooks;

        return $this;
    }
    public function __toString() {
        return $this->getTitle() . ' (' . $this->getAuthor() . ') ' . $this->getMyBooks()->getId();
    }
      
    
}
