<?php

declare(strict_types=1);

namespace App\Factory;

use App\ExpressionLanguage\FunctionProvider\ECommerceExpressionLanguageProvider;
use Symfony\Component\ExpressionLanguage\ExpressionFunction;

final class CompletionListFactory
{
    public function __construct(
        private readonly ECommerceExpressionLanguageProvider $expressionLanguageProvider,
    ) {
    }

    public function create(array $varNames): array
    {
        return [
            ...array_map(
                fn (ExpressionFunction $ef): array => ['label' => $ef->getName(), 'type' => 'function'],
                $this->expressionLanguageProvider->getFunctions(),
            ),
            ...array_map(
                fn (string $name): array => ['label' => $name, 'type' => 'variable'],
                $varNames,
            ),
        ];
    }
}
