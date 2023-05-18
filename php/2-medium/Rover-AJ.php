<?php

/* Utilisation de str_split() afin de diviser la séquence en un tableau de commandes.
Utilisation de la méthodde rotateRover(), afin d'utiliser un tableau de direction pour faire des rotations plus simple.
Utilisation de displaceRover(), afin d'extraire la logique de déplacement du rover.
$displacement1 a été supprimé, le déplacement est désormais déterminé directement en fonction de la commande.
Structure de contrôle if et elseif pour une meilleure lisibilité du code au lieu de plusieurs if à la suite.
*/ 

declare(strict_types=1);

namespace App;

class Rover
{
    private string $direction;
    private int $y;
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }

    public function receive(string $commandsSequence): void
    {
        $commands = str_split($commandsSequence);
        
        foreach ($commands as $command) {
            if ($command === "l" || $command === "r") {
                $this->rotateRover($command);
            } else {
                $this->displaceRover($command);
            }
        }
    }
    
    private function rotateRover(string $command): void
    {
        $directions = ['N', 'E', 'S', 'W'];
        $currentDirectionIndex = array_search($this->direction, $directions);
        
        if ($command === "r") {
            $newDirectionIndex = ($currentDirectionIndex + 1) % 4;
        } else {
            $newDirectionIndex = ($currentDirectionIndex + 3) % 4;
        }
        
        $this->direction = $directions[$newDirectionIndex];
    }
    
    private function displaceRover(string $command): void
    {
        $displacement = ($command === "f") ? 1 : -1;
        
        if ($this->direction === "N") {
            $this->y += $displacement;
        } elseif ($this->direction === "S") {
            $this->y -= $displacement;
        } elseif ($this->direction === "W") {
            $this->x -= $displacement;
        } else {
            $this->x += $displacement;
        }
    }
}
