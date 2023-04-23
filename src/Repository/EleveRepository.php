<?php

declare(strict_types=1);

namespace App\Repository;

use App\Enum\Distance;
use App\Model\Bourse;
use App\Model\Eleve;
use App\Model\Voeu;

final class EleveRepository
{
    /**
     * @return Eleve[]
     */
    public function getEleves(): array
    {
        return [
            new Eleve(
                'Florian Merle',
                [],
                [
                    new Voeu('CPE', true, Distance::Proche),
                ],
            ),
            new Eleve(
                'John Doe',
                [
                    new Bourse(2019, 1000),
                    new Bourse(2020, 1000),
                ],
                [
                    new Voeu('INSA', false, Distance::Loin),
                    new Voeu('CPE', true, Distance::Loin),
                ],
            ),
        ];
    }

    public function isRegisterdAtParcoursup(Eleve $eleve): bool
    {
        return true;
    }
}
