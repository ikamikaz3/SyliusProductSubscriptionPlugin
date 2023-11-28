<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;

interface PlanGatewayConfigInterface extends ResourceInterface
{
    public function getConfig(): array;

    public function setConfig(array $config): void;

    public function getGatewayName(): ?string;

    public function setGatewayName(string $gatewayName): void;

    public function getFactoryName(): ?string;

    public function setFactoryName(string $factoryName): void;
}
