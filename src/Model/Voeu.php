<?php

declare(strict_types=1);

namespace App\Model;

use App\Enum\Distance;

final class Voeu
{
    public function __construct(
        public readonly string $libelle,
        public readonly bool $accepte,
        public readonly Distance $distance,
    ) {
    }
}
