<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Order;
use App\Model\Customer;
use App\Model\Address;

final class CustomerRepository
{
    /**
     * @return Customer[]
     */
    public function getCustomers(): array
    {
        return [
            new Customer(
                'Alice',
                [
                    new Order(4300, 2022),
                ],
                new Address('France'),
            ),
            new Customer(
                'Bob',
                [
                    new Order(4300, 2021),
                ],
                new Address('France'),
            ),
            new Customer(
                'Chuck',
                [
                    new Order(4300, 2021),
                ],
                new Address('Italie'),
            ),
        ];
    }

    public function isRegisterdToTheLoyaltyProgram(Customer $customer): bool
    {
        return true;
    }

    public function isTheBossSon(Customer $customer): bool
    {
        return in_array(
            $customer->nom,
            [
                'Chuck',
            ],
        );
    }
}
