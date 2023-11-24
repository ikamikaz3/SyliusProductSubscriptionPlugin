<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin;

use Motherbrain\SyliusProductSubscriptionPlugin\DependencyInjection\CompilerPass\RegisterPlanConfigTypePass;
use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class MotherbrainSyliusProductSubscriptionPlugin extends Bundle
{
    use SyliusPluginTrait;

    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new RegisterPlanConfigTypePass());
    }

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
