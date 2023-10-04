<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MemberRepository::class)]
class Member
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'member', targetEntity: MyBooks::class)]
    private Collection $mybooks;

    public function __construct()
    {
        $this->mybooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, MyBooks>
     */
    public function getMybooks(): Collection
    {
        return $this->mybooks;
    }

    public function addMybook(MyBooks $mybook): static
    {
        if (!$this->mybooks->contains($mybook)) {
            $this->mybooks->add($mybook);
            $mybook->setMember($this);
        }

        return $this;
    }

    public function removeMybook(MyBooks $mybook): static
    {
        if ($this->mybooks->removeElement($mybook)) {
            // set the owning side to null (unless already changed)
            if ($mybook->getMember() === $this) {
                $mybook->setMember(null);
            }
        }

        return $this;
    }
}
