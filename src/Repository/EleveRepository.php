<?php

declare(strict_types=1);

namespace App\Repository;

use App\Enum\Distance;
use App\Model\Bourse;
use App\Model\Eleve;
use App\Model\Voeux;

final class EleveRepository
{
    /**
     * @return Eleve[]
     */
    public function getEleves(): array
    {
        return [
            new Eleve(
                'Mathias Arlaud',
                [],
                [
                    new Voeux('CPE', true, Distance::Proche),
                ],
            ),
            new Eleve(
                'Florian Merle',
                [],
                [
                    new Voeux('CPE', true, Distance::Proche),
                ],
            ),
            new Eleve(
                'Jane Doe',
                [
                    new Bourse(2019, 1000),
                    new Bourse(2020, 1000),
                ],
                [
                    new Voeux('INSA', false, Distance::Loin),
                    new Voeux('CPE', true, Distance::Loin),
                ],
            ),
        ];
    }

    public function isRegisterdAtParcoursup(Eleve $eleve): bool
    {
        return true;
    }

    public function aVerseUnBonPotDeVin(Eleve $eleve): bool
    {
        return in_array(
            $eleve->nom,
            [
                'Mathias Arlaud',
            ],
        );
    }
}
