<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
#[UniqueEntity('title', 'Le titre est déja utilisé. Merci de changer.')]
#[UniqueEntity('content', 'Mais t\'es grave toi ! Deux fois le même contenu c\'est louche... Recommence !!!!')]

class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
 

    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $title = null;

    #[ORM\Column(length: 10000)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 50, max: 10000)]
    private ?string $content = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $auteur = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
 


    
    private ?\DateTimeImmutable $createdAt = null;
public function __construct()
{
    $this->createdAt =new \DateTimeImmutable();
    $this->marks = new ArrayCollection();
}
    #[ORM\Column(nullable: true)]
    
    private ?\DateTimeImmutable $modifiedAt = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column]
    private ?bool $isPublic = false;

    #[ORM\OneToMany(mappedBy: 'article', targetEntity: Mark::class, orphanRemoval: true)]
    private Collection $marks;
    private ?float $moyenne = null;
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getModifiedAt(): ?\DateTimeImmutable
    {
        return $this->modifiedAt;
    }

    public function setModifiedAt(?\DateTimeImmutable $modifiedAt): self
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getIsPublic(): ?bool
    {
        return $this->isPublic;
    }

    public function setIsPublic(bool $isPublic): self
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    /**
     * @return Collection<int, Mark>
     */
    public function getMark(): Collection
    {
        return $this->marks;
    }
    
    public function addMark(Mark $mark): self
    {
        if (!$this->marks->contains($mark)) {
            $this->marks->add($mark);
            $mark->setArticles($this);
        }

        return $this;
    }

    public function removeMark(Mark $mark): self
    {
        if ($this->marks->removeElement($mark)) {
            // set the owning side to null (unless already changed)
            if ($mark->getArticles() === $this) {
                $mark->setArticles(null);
            }
        }

        return $this;
    }
    public function getMoyenne()
    {
        $marks = $this->marks;

        if ($marks->toArray() === []) {
            $this->moyenne = null;
            return $this->moyenne;
        }

        $total = 0;
        foreach ($marks as $mark) {
            $total += $mark->getMark();
        }

        $this->moyenne = $total / count($marks);

        return $this->moyenne;
    }

     
}

