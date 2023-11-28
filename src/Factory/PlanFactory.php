<?php

namespace Motherbrain\SyliusProductSubscriptionPlugin\Factory;

use Motherbrain\SyliusProductSubscriptionPlugin\Entity\PlanGatewayConfigInterface;
use Motherbrain\SyliusProductSubscriptionPlugin\Entity\PlanInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

class PlanFactory implements PlanFactoryInterface
{
    public function __construct(
        private FactoryInterface $decoratedFactory,
        private FactoryInterface $planGatewayConfigFactory
    ) {
    }

    public function createNew(): PlanInterface
    {
        return $this->decoratedFactory->createNew();
    }

    public function createWithGateway(string $gatewayName): PlanInterface
    {
        /** @var PlanGatewayConfigInterface $planGatewayConfig */
        $planGatewayConfig = $this->planGatewayConfigFactory->createNew();
        $planGatewayConfig->setFactoryName($gatewayName);

        /** @var PlanInterface $plan */
        $plan = $this->decoratedFactory->createNew();
        $plan->setPlanGatewayConfig($planGatewayConfig);

        return $plan;
    }
}
