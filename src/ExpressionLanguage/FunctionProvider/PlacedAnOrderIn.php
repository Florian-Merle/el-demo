<?php

declare(strict_types=1);

namespace App\ExpressionLanguage\FunctionProvider;

use App\Model\Order;
use App\Model\Customer;

final class PlacedAnOrderIn
{
    public function __invoke($arguments, Customer $customer, int $year): bool
    {
        $orders = $customer->orders;
        $orders = array_filter($orders, fn (Order $o): bool => $o->year === $year);

        return false === empty($orders);
    }
}
