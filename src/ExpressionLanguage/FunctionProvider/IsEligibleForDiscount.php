<?php

declare(strict_types=1);

namespace App\ExpressionLanguage\FunctionProvider;

use App\Model\Customer;

final class IsEligibleForDiscount
{
    public function __construct(
        private readonly PlacedAnOrderIn $placedAnOrderIn,
        private readonly BillingAddressLocatedIn $billingAddressLocatedIn,
        private readonly IsRegisteredToTheLoyaltyProgram $isRegisteredToTheLoyaltyProgram,
    ) {
    }

    public function __invoke($arguments, Customer $customer, int $year): bool
    {
        return
            $this->placedAnOrderIn->__invoke($arguments, $customer, $year) &&
            $this->billingAddressLocatedIn->__invoke($arguments, $customer) &&
            $this->isRegisteredToTheLoyaltyProgram->__invoke($arguments, $customer)
        ;
    }
}
