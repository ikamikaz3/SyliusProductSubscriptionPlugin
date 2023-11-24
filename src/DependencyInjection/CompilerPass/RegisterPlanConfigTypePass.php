<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class RegisterPlanConfigTypePass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->has('motherbrain_product_subscription_plugin.form_registry.plan_config')) {
            return;
        }

        $formRegistry = $container->findDefinition('motherbrain_product_subscription_plugin.form_registry.plan_config');
        $planFactories = [];

        $planConfigurationTypes = $container->findTaggedServiceIds('motherbrain_product_subscription_plugin.plan_configuration_type');

        foreach ($planConfigurationTypes as $id => $attributes) {
            /** @var array $attribute */
            foreach ($attributes as $attribute) {
                if (!isset($attribute['type'], $attribute['label'])) {
                    throw new \InvalidArgumentException('Tagged plan configuration type needs to have `type` and `label` attributes.');
                }

                $planFactories[] = [
                    'label' => $attribute['label'],
                    'priority' => $attribute['priority'] ?? 0,
                    'type' => $attribute['type'],
                ];

                $formRegistry->addMethodCall(
                    'add',
                    ['plan_config', $attribute['type'], $container->getDefinition($id)->getClass()],
                );
            }

            usort($planFactories, fn (array $firstGateway, array $secondGateway): int => $secondGateway['priority'] - $firstGateway['priority']);

            $sortedPlanFactories = [];
            /** @var array $factory */
            foreach ($planFactories as $factory) {
                $sortedPlanFactories[$factory['type']] = $factory['label'];
            }

            $container->setParameter('motherbrain_product_subscription_plugin.plan_factories', $sortedPlanFactories);
        }
    }
}
