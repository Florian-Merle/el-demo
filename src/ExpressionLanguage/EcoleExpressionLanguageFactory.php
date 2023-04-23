<?php

declare(strict_types=1);

namespace App\ExpressionLanguage;

use App\ExpressionLanguage\FunctionProvider\EleveExpressionLanguageProvider;

final class EcoleExpressionLanguageFactory
{
    public function __construct(
        private readonly EleveExpressionLanguageProvider $eleveExpressionLanguageProvider,
    )  {
    }

    public function create(): EcoleExpressionLanguage
    {
        return new EcoleExpressionLanguage(null, [
            $this->eleveExpressionLanguageProvider,
        ]);
    }
}
