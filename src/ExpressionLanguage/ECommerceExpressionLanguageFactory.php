<?php

declare(strict_types=1);

namespace App\ExpressionLanguage;

use App\ExpressionLanguage\FunctionProvider\ECommerceExpressionLanguageProvider;

final class ECommerceExpressionLanguageFactory
{
    public function __construct(
        private readonly ECommerceExpressionLanguageProvider $eCommerceExpressionLanguageProvider,
    )  {
    }

    public function create(): ECommerceExpressionLanguage
    {
        return new ECommerceExpressionLanguage(null, [
            $this->eCommerceExpressionLanguageProvider,
        ]);
    }
}
