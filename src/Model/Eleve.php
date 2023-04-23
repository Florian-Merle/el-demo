<?php

declare(strict_types=1);

namespace App\Model;

final class Eleve
{
    /**
     * @param Bourse[] $bourses
     * @param Voeux[] $voeux
     */
    public function __construct(
        public readonly string $nom,
        public readonly array $bourses,
        public readonly array $voeux,
    ) {
    }
}
