<?php


namespace App\Validation\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class CreateSheetDto
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 255)]
    public ?string $name = null;

    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 255)]
    public ?string $synopsis = null;

    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 255)]
    #[Assert\Choice(choices: ['movie', 'series'])]
    public ?string $type = null;
}