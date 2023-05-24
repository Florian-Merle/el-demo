<?php

declare(strict_types=1);

namespace App\ExpressionLanguage\FunctionProvider;

use App\Model\Customer;
use App\Repository\CustomerRepository;

final class IsRegisteredToTheLoyaltyProgram
{
    public function __construct(
        private readonly CustomerRepository $customerRepository,
    ) {
    }

    public function __invoke($arguments, Customer $customer): bool
    {
        return $this->customerRepository->isRegisterdToTheLoyaltyProgram($customer);
    }
}
