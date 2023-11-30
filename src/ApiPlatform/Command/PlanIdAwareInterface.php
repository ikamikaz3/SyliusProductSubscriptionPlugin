<?php

namespace Motherbrain\SyliusProductSubscriptionPlugin\ApiPlatform\Command;

use Sylius\Bundle\ApiBundle\Command\CommandAwareDataTransformerInterface;

interface PlanIdAwareInterface extends CommandAwareDataTransformerInterface
{
    public function getPlanId(): string;

    public function setPlanId(string $planId): void;
}
