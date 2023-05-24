<?php

declare(strict_types=1);

namespace App\ExpressionLanguage\FunctionProvider;

use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionFunctionProviderInterface;

final class ECommerceExpressionLanguageProvider implements ExpressionFunctionProviderInterface
{
    public function __construct(
        private readonly IsEligibleForDiscount $isEligibleForDiscount,
        private readonly PlacedAnOrderIn $placedAnOrderIn,
        private readonly BillingAddressLocatedIn $billingAddressLocatedIn,
        private readonly IsRegisteredToTheLoyaltyProgram $isRegisteredToTheLoyaltyProgram,
        private readonly IsTheBossSon $isTheBossSon,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new ExpressionFunction(
                'is_eligible_for_discount',
                function ($str) {
                },
                $this->isEligibleForDiscount,
            ),

            new ExpressionFunction(
                'placed_an_order_in',
                function ($str) {
                },
                $this->placedAnOrderIn,
            ),

            new ExpressionFunction(
                'billing_address_located_in',
                function ($str) {
                },
                $this->billingAddressLocatedIn,
            ),

            new ExpressionFunction(
                'is_registered_to_the_loyalty_program',
                function ($str) {
                },
                $this->isRegisteredToTheLoyaltyProgram,
            ),

            new ExpressionFunction(
                'is_the_boss_son',
                function ($str) {
                },
                $this->isTheBossSon,
            ),
        ];
    }
}
