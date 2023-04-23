<?php

declare(strict_types=1);

namespace App\Model;

final class Bourse
{
    public function __construct(
        public readonly int $annee,
        public readonly int $montant,
    ) {
    }
}
