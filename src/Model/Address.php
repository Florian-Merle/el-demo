<?php

declare(strict_types=1);

namespace App\Model;

use App\Enum\Distance;

final class Address
{
    public function __construct(
        public readonly string $country,
    ) {
    }
}
