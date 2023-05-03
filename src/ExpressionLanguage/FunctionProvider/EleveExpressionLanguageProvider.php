<?php

declare(strict_types=1);

namespace App\ExpressionLanguage\FunctionProvider;

use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionFunctionProviderInterface;

final class EleveExpressionLanguageProvider implements ExpressionFunctionProviderInterface
{
    public function __construct(
        private readonly EstEligiblePourLaBourse $estEligiblePourLaBourse,
        private readonly AEuUneBourseEn $aEuUneBourseEn,
        private readonly EstAccepteLoin $estAccepteLoin,
        private readonly EstInscritAParcoursup $estInscritAParcoursup,
        private readonly AVerseUnBonPotDeVin $aVerseUnBonPotDeVin,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new ExpressionFunction(
                'est_eligible_pour_la_bourse',
                function ($str) {
                },
                $this->estEligiblePourLaBourse,
            ),

            new ExpressionFunction(
                'a_eu_une_bourse_en',
                function ($str) {
                },
                $this->aEuUneBourseEn,
            ),

            new ExpressionFunction(
                'est_accepte_loin',
                function ($str) {
                },
                $this->estAccepteLoin,
            ),

            new ExpressionFunction(
                'est_inscrit_a_parcoursup',
                function ($str) {
                },
                $this->estInscritAParcoursup,
            ),

            new ExpressionFunction(
                'a_verse_un_bon_pot_de_vin',
                function ($str) {
                },
                $this->aVerseUnBonPotDeVin,
            ),
        ];
    }
}
