<?php

declare(strict_types=1);

namespace App\Controller;

use App\Factory\CompletionListFactory;
use App\Repository\RuleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DefineEligibleForDiscountRuleAction extends AbstractController
{
    public function __construct(
        private readonly RuleRepository $ruleRepository,
        private readonly CompletionListFactory $completionListFactory,
    ) {
    }
    
    #[Route('/define_eligible_for_discount_rule', name: 'define_eligible_for_discount_rule')]
    public function __invoke(
        Request $request,
    ): Response {
        $data = [
            'expression' => $this->ruleRepository->findEligiblePourBourse(),
        ];
        $form = $this->createExpressionForm($data);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->ruleRepository->saveEligiblePourBourse($form->getData()['expression']);

            return $this->redirectToRoute('rules');
        }

        return $this->render('define_eligible_for_discount_rule.html.twig', [
            'form' => $form->createView(),
            'completionList' => $this->completionListFactory->create(['customer']),
        ]);
    }

    private function createExpressionForm(array $data): Form
    {
        return $this->createFormBuilder($data)
            ->add('expression', TextType::class, ['required' => false])
            ->add('submit', SubmitType::class)
            ->getForm()
        ;
    }
}
