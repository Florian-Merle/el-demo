<?php

declare(strict_types=1);

namespace App\ExpressionLanguage;

use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

final class EcoleExpressionLanguage extends ExpressionLanguage
{
    public function __construct(
        CacheItemPoolInterface $cache = null,
        array $providers = [],
    ) {
        parent::__construct($cache, $providers);
    }
}
