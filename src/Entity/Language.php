<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use ApiPlatform\Metadata\{ApiResource,
    Get,
    Post,
    Put,
    Delete
};
#[ApiResource(
    description: 'Language entity representing a language with a code and title.' 
)]
#[ORM\Entity(repositoryClass: LanguageRepository::class)]
#[UniqueConstraint(name: 'unique_language_code', columns: ['code'])]
class Language
{
    #[ORM\Id]
    #[ORM\Column(length: 2)]
    #[ApiResource(
        description: 'The ISO 639-1 code of the language, must be unique.'
    )]
    private ?string $code = null;

    #[ORM\Column(length: 50)]
    private ?string $title = null;

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
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
}
