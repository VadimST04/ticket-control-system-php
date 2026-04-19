<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<int, Ticket>
     */
    #[ORM\OneToMany(targetEntity: Ticket::class, mappedBy: 'category')]
    private Collection $relatedTickets;

    public function __construct()
    {
        $this->relatedTickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
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
     * @return Collection<int, Ticket>
     */
    public function getRelatedTickets(): Collection
    {
        return $this->relatedTickets;
    }

    public function addRelatedTicket(Ticket $relatedTicket): static
    {
        if (!$this->relatedTickets->contains($relatedTicket)) {
            $this->relatedTickets->add($relatedTicket);
            $relatedTicket->setCategory($this);
        }

        return $this;
    }

    public function removeRelatedTicket(Ticket $relatedTicket): static
    {
        if ($this->relatedTickets->removeElement($relatedTicket)) {
            // set the owning side to null (unless already changed)
            if ($relatedTicket->getCategory() === $this) {
                $relatedTicket->setCategory(null);
            }
        }

        return $this;
    }
}
