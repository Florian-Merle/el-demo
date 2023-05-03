<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\RegleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ReglesAction extends AbstractController
{
    public function __construct(
        private readonly RegleRepository $regles,
    ) {
    }


    #[Route('/', name: 'regles')]
    public function __invoke(): Response {
        return $this->render('regles.html.twig', [
            'regles' => [
                'eligible_pour_bourse' =>  $this->regles->findEligiblePourBourse(),
            ],
        ]);
    }
}
