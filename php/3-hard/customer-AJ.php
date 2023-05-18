<?php

/* 
Les déclarations des variables $name et $rentals sont mise au début 
afin d'avoir une meilleure visibilité dans le code et par rapport aus bonnes pratiques 
Ajout d'un retour void dans dans la fonction addRental pour indiquer qu'elle ne retourne rien
Ajout des accolades manquantes dans les conditions
Modification de l'égalité == vers === afin de vérifier à la fois la valeur et le type pour les variables movie:NEW_RELEASE
Modification de la déclaration de variable $thisAmountpour qu'elle soit déclarée à l'intérieur de la boucle foreach pour éviter une réutilisation fausse de la même variables lors d'itérations
*/

declare(strict_types=1);

namespace App;

class Customer
{
    private string $name;
    private array $rentals = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $rental): void
    {
        $this->rentals[] = $rental;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function statement(): string
    {
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";

        foreach ($this->rentals as $rental) {
            $thisAmount = 0.0;
            /* @var $rental Rental */
            // determines the amount for each line
            switch ($rental->getMovie()->getPriceCode()) {
                case Movie::REGULAR:
                    $thisAmount += 2;
                    if ($rental->getDaysRented() > 2) {
                        $thisAmount += ($rental->getDaysRented() - 2) * 1.5;
                    }
                    break;
                case Movie::NEW_RELEASE:
                    $thisAmount += $rental->getDaysRented() * 3;
                    break;
                case Movie::CHILDREN:
                    $thisAmount += 1.5;
                    if ($rental->getDaysRented() > 3) {
                        $thisAmount += ($rental->getDaysRented() - 3) * 1.5;
                    }
                    break;
            }

            $frequentRenterPoints++;

            if ($rental->getMovie()->getPriceCode() === Movie::NEW_RELEASE
                && $rental->getDaysRented() > 1) {
                $frequentRenterPoints++;
            }

            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . number_format($thisAmount, 1) . "\n";
            $totalAmount += $thisAmount;
        }

        $result .= "You owed " . number_format($totalAmount, 1) . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";

        return $result;
    }
}
