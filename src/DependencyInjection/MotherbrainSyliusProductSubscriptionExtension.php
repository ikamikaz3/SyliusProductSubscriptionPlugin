<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\DependencyInjection;

use Sylius\Bundle\CoreBundle\DependencyInjection\PrependDoctrineMigrationsTrait;
use Sylius\Bundle\ResourceBundle\DependencyInjection\Extension\AbstractResourceExtension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class MotherbrainSyliusProductSubscriptionExtension extends AbstractResourceExtension implements PrependExtensionInterface
{
    use PrependDoctrineMigrationsTrait;

    /** @psalm-suppress UnusedVariable */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $configs);
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../../config'));

        $loader->load('services.yaml');

        $this->registerResources('motherbrain_sylius_product_subscription', $config['driver'], $config['resources'], $container);
    }

    public function prepend(ContainerBuilder $container): void
    {
        $this->prependDoctrineMigrations($container);
        $this->prependApiPlatformMapping($container);
    }

    private function prependApiPlatformMapping(ContainerBuilder $container): void
    {
        /** @var array<string, array<string, string>> $metadata */
        $metadata = $container->getParameter('kernel.bundles_metadata');

        $path = $metadata['MotherbrainSyliusProductSubscriptionPlugin']['path'] . '/config/api_resources';

        $container->prependExtensionConfig('api_platform', ['mapping' => ['paths' => [$path]]]);
    }

    protected function getMigrationsNamespace(): string
    {
        return 'Motherbrain\SyliusProductSubscriptionPlugin\Migrations';
    }

    protected function getMigrationsDirectory(): string
    {
        return '@MotherbrainSyliusProductSubscriptionPlugin/migrations';
    }

    protected function getNamespacesOfMigrationsExecutedBefore(): array
    {
        return [
            'Sylius\Bundle\CoreBundle\Migrations',
        ];
    }
}
