<?php

declare(strict_types=1);

use App\ExpressionLanguage\EcoleExpressionLanguage;
use App\ExpressionLanguage\EcoleExpressionLanguageFactory;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();
    $services = $containerConfigurator->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure()
    ;

    $services->load(
        'App\\',
        __DIR__.'/../src/',
    )->exclude([
        __DIR__.'/../src/DependencyInjection',
        __DIR__.'/../src/Entity',
        __DIR__.'/../src/Kernel.php',
    ]);

    $services->set(EcoleExpressionLanguageFactory::class);

    $services->set(EcoleExpressionLanguage::class)
        ->factory([service(EcoleExpressionLanguageFactory::class), 'create']);
};
