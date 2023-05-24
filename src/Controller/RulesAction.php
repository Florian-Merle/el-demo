<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\RuleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class RulesAction extends AbstractController
{
    public function __construct(
        private readonly RuleRepository $rules,
    ) {
    }


    #[Route('/', name: 'rules')]
    public function __invoke(): Response {
        return $this->render('rules.html.twig', [
            'rules' => [
                'eligible_pour_bourse' =>  $this->rules->findEligiblePourBourse(),
            ],
        ]);
    }
}
