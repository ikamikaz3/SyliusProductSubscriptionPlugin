<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\DependencyInjection;

use Motherbrain\SyliusProductSubscriptionPlugin\Controller\PlanController;
use Motherbrain\SyliusProductSubscriptionPlugin\Entity\Plan;
use Motherbrain\SyliusProductSubscriptionPlugin\Entity\PlanInterface;
use Motherbrain\SyliusProductSubscriptionPlugin\Form\Type\PlanType;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Component\Resource\Factory\Factory;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * @psalm-suppress UnusedVariable
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('motherbrain_sylius_product_subscription_plugin');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('driver')->defaultValue(SyliusResourceBundle::DRIVER_DOCTRINE_ORM)->end()
            ->end()
        ;

        $this->addResourcesSection($rootNode);

        return $treeBuilder;
    }

    private function addResourcesSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
                ->arrayNode('resources')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('plan')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(Plan::class)->cannotBeEmpty()->end()
                                        ->scalarNode('interface')->defaultValue(PlanInterface::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(PlanController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->cannotBeEmpty()->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->scalarNode('form')->defaultValue(PlanType::class)->cannotBeEmpty()->end()
                                    ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
