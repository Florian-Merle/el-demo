<?php

declare(strict_types=1);

namespace App\ExpressionLanguage\FunctionProvider;

use App\Model\Customer;

final class BillingAddressLocatedIn
{
    public function __invoke($arguments, Customer $customer, string $country): bool
    {
        return $customer->billingAddress->country === $country;
    }
}
