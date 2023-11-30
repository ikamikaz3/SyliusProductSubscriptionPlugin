<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

interface PlanAwareInterface
{
    public function getPlan(): ?PlanInterface;

    public function setPlan(PlanInterface $plan): void;
}
