<?php

namespace App\Enums;

enum DisciplineEnum
{
    case Animalisme;
    case Auspex;
    case Celerity;
    case Domination;
    case Presence;
    case Protéisme;
    case Puissance;

    public function description(): string
    {
        return fake()->sentence(40);
    }
}
