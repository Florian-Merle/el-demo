<?php

declare(strict_types=1);

namespace App\ExpressionLanguage\FunctionProvider;

use App\Model\Bourse;
use App\Model\Eleve;

final class AEuUneBourseEn
{
    public function __invoke($arguments, Eleve $eleve, int $annee): bool
    {
        $bourses = $eleve->bourses;
        $bourses = array_filter($bourses, fn (Bourse $b): bool => $b->annee === $annee);

        return false === empty($bourses);
    }
}
