<?php

declare(strict_types=1);

namespace App\Controller;

use App\Factory\CompletionListFactory;
use App\Repository\RegleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DefinirRegleEligiblePourBourseAction extends AbstractController
{
    public function __construct(
        private readonly RegleRepository $regles,
        private readonly CompletionListFactory $completionListFactory,
    ) {
    }
    
    #[Route('/definir_regle_eligible_pour_bourse', name: 'definir_regle_eligible_pour_bourse')]
    public function __invoke(
        Request $request,
    ): Response {
        $data = [
            'expression' => $this->regles->findEligiblePourBourse(),
        ];
        $form = $this->createExpressionForm($data);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->regles->saveEligiblePourBourse($form->getData()['expression']);

            return $this->redirectToRoute('regles');
        }

        return $this->render('definir_regle_eligible_pour_bourse.html.twig', [
            'form' => $form->createView(),
            'completionList' => $this->completionListFactory->create(['eleve']),
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
