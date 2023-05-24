<?php

declare(strict_types=1);

namespace App\Model;

final class Order
{
    public function __construct(
        public readonly int $total,
        public readonly int $year,
    ) {
    }
}
