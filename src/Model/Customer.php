<?php

declare(strict_types=1);

namespace App\Model;

final class Customer
{
    /**
     * @param Order[] $orders
     */
    public function __construct(
        public readonly string $nom,
        public readonly array $orders,
        public readonly Address $billingAddress,
    ) {
    }
}
