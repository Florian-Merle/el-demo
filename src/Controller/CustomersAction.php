<?php

declare(strict_types=1);

namespace App\Controller;

use App\ExpressionLanguage\ECommerceExpressionLanguage;
use App\Model\Customer;
use App\Repository\CustomerRepository;
use App\Repository\RuleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CustomersAction extends AbstractController
{
    public function __construct(
        private readonly ECommerceExpressionLanguage $el,
        private readonly CustomerRepository $customerRepository,
        private readonly RuleRepository $ruleRepository,
    ) {
    }

    #[Route('/customers', name: 'customers')]
    public function __invoke(
        Request $request,
    ): Response {
        $eligiblePourBourse = $this->ruleRepository->findEligiblePourBourse();

        $customers = array_map(fn (Customer $c): array => [
            'customer' => $c,
            'eligiblePourBourse' => $this->el->evaluate($eligiblePourBourse, ['customer' => $c]),
        ], $this->customerRepository->getCustomers());

        return $this->render('customers.html.twig', [
            'customers' => $customers,
        ]);
    }
}
