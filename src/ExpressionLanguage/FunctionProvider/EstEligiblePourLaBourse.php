<?php

declare(strict_types=1);

namespace App\ExpressionLanguage\FunctionProvider;

use App\Model\Eleve;

final class EstEligiblePourLaBourse
{
    public function __construct(
        private readonly AEuUneBourseEn $aEuUneBourseEn,
        private readonly EstAccepteLoin $estAccepteLoin,
        private readonly EstInscritAParcoursup $estInscritAParcoursup,
    ) {
    }

    public function __invoke($arguments, Eleve $eleve, int $annee): bool
    {
        return
            $this->aEuUneBourseEn->__invoke($arguments, $eleve, $annee) &&
            $this->estAccepteLoin->__invoke($arguments, $eleve) &&
            $this->estInscritAParcoursup->__invoke($arguments, $eleve)
        ;
    }
}
