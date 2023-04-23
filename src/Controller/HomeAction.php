<?php

declare(strict_types=1);

namespace App\Controller;

use App\ExpressionLanguage\EcoleExpressionLanguage;
use App\Repository\EleveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomeAction extends AbstractController
{
    public function __construct(
        private readonly EcoleExpressionLanguage $expressionLanguage,
        private readonly EleveRepository $repository,
    ) {
    }

    #[Route('/', name: 'home')]
    public function __invoke(
        Request $request,
    ): Response {
        $expression = '';
        $compiled = '';
        $result = '';
        $data = [];

        $form = $this->createFormBuilder($data)
            ->add('expression', TextType::class)
            ->add('submit', SubmitType::class)
            ->getForm()
        ;

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $expression = $data['expression'];
            // $compiled = $this->expressionLanguage->compile($expression, []);
            $result = $this->expressionLanguage->evaluate($expression, [
                'eleve' => $this->repository->getEleves()[1],
            ]);
        }

        dump($result);

        return $this->render('home.html.twig', [
            'form' => $form->createView(),
            'expression' => $expression,
            // 'compiled' => $compiled,
            'result' => $result,
        ]);
    }

        // $ast = $this->expressionLanguage
        //     ->parse('lowercase("azeAZE")', [])
        //     ->getNodes()
        // ;
        // dump($ast);
        //
        // $foo = [
        //     'bar' => 'BAZ',
        // ];
        //
        // $expression = $this->expressionLanguage->parse('lowercase(foo["bar"])', ['foo']);
        // $result = $this->expressionLanguage->evaluate($expression, ['foo' => $foo]);
        // dump($result);
        //
        // $expression = new SerializedParsedExpression(
        //     'lowercase("FOO")',
        //     serialize($this->expressionLanguage->parse('lowercase("FOO")', [])->getNodes())
        // );
        // $result = $this->expressionLanguage->evaluate($expression);
        // dump($result);
        //
        // $result = $this->expressionLanguage->compile('"A" ? "B" : "C"');
        // dump($result);
        
        // $foo = [
        //     'bar' => 'BAZ',
        // ];
        //
        // $expression = $this->expressionLanguage->parse('lowercase(foo["bar"])', ['foo']);
        // $result = $this->expressionLanguage->compile($expression, ['foo' => $foo]);


        // $expresion = '((notes.semestres * 2 + notes.soutenance) / 3) < 10';
        // $notes = [
        //     'semestres' => 12,
        //     'soutenance' => 9,
        // ];
        //
        // $ast = (new ExpressionLanguage())
        //     ->parse($expresion, ['notes'])
        //     ->getNodes()
        // ;

}
