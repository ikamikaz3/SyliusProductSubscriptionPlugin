<?php

namespace Motherbrain\SyliusProductSubscriptionPlugin\Factory;

use Motherbrain\SyliusProductSubscriptionPlugin\Entity\PlanInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface PlanFactoryInterface extends FactoryInterface
{
    public function createWithGateway(string $gatewayName): PlanInterface;
}
