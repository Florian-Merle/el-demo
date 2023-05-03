<?php

declare(strict_types=1);

namespace App\ExpressionLanguage\FunctionProvider;

use App\Enum\Distance;
use App\Model\Eleve;
use App\Model\Voeux;

final class EstAccepteLoin
{
    public function __invoke($arguments, Eleve $eleve): bool
    {
        $voeux = $eleve->voeux;
        $voeux = array_filter($voeux, fn (Voeux $v): bool => true === $v->accepte);
        $voeux = array_filter($voeux, fn (Voeux $v): bool => Distance::Loin === $v->distance);

        return false === empty($voeux);
    }
}
