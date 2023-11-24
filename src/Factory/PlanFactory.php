<?php

namespace Motherbrain\SyliusProductSubscriptionPlugin\Factory;

use Motherbrain\SyliusProductSubscriptionPlugin\Entity\PlanInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AbstractExampleFactory;
use Sylius\Component\Resource\Factory\Factory;
use Sylius\Component\Resource\Factory\FactoryInterface;

class PlanFactory implements PlanFactoryInterface
{
    public function __construct(private FactoryInterface $decoratedFactory)
    {
    }

    public function createNew(): PlanInterface
    {
        return $this->decoratedFactory->createNew();
    }

    public function createWithGateway(string $gateway): PlanInterface
    {
        return $this->decoratedFactory->createNew();
    }
}
