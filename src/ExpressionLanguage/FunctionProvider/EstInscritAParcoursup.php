<?php

declare(strict_types=1);

namespace App\ExpressionLanguage\FunctionProvider;

use App\Model\Eleve;
use App\Repository\EleveRepository;

final class EstInscritAParcoursup
{
    public function __construct(
        private readonly EleveRepository $eleveRepository,
    ) {
    }

    public function __invoke($arguments, Eleve $eleve): bool
    {
        return $this->eleveRepository->isRegisterdAtParcoursup($eleve);
    }
}
