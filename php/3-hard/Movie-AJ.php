<?php

/*
Ajout d'une déclaration void à la fonction setPriceCode pour indiquer qu'elle ne retourne rien.
Appel de setPriceCode dans le constructeur pour initialiser correctement la propriété $priceCode.
Correction de l'indentation afin d'avoir une meilleure visibilité dans le code
*/

declare(strict_types=1);

namespace App;

class Movie
{
    public const CHILDREN = 2;
    public const REGULAR = 0;
    public const NEW_RELEASE = 1;

    private string $title;
    private int $priceCode;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->setPriceCode($priceCode);
    }

    public function getPriceCode(): int
    {
        return $this->priceCode;
    }

    public function setPriceCode(int $code): void
    {
        $this->priceCode = $code;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
