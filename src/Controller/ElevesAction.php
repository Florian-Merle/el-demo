<?php

declare(strict_types=1);

namespace App\Controller;

use App\ExpressionLanguage\EcoleExpressionLanguage;
use App\Model\Eleve;
use App\Repository\EleveRepository;
use App\Repository\RegleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ElevesAction extends AbstractController
{
    public function __construct(
        private readonly EcoleExpressionLanguage $el,
        private readonly EleveRepository $eleveRepository,
        private readonly RegleRepository $regleRepository,
    ) {
    }

    #[Route('/eleves', name: 'eleves')]
    public function __invoke(
        Request $request,
    ): Response {
        $eligiblePourBourse = $this->regleRepository->findEligiblePourBourse();

        $eleves = array_map(fn (Eleve $e): array => [
            'eleve' => $e,
            'eligiblePourBourse' => $this->el->evaluate($eligiblePourBourse, ['eleve' => $e]),
        ], $this->eleveRepository->getEleves());

        return $this->render('eleves.html.twig', [
            'eleves' => $eleves,
        ]);
    }
}
