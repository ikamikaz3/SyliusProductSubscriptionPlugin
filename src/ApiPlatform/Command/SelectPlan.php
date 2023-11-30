<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\ApiPlatform\Command;

use Sylius\Component\Addressing\Model\AddressInterface;

final class SelectPlan implements PlanIdAwareInterface
{
    public ?string $planId = null;

    public ?AddressInterface $billingAddress = null;

    public function getPlanId(): string
    {
        return $this->planId;
    }

    public function setPlanId(string $planId): void
    {
        $this->planId = $planId;
    }

    public function setBillingAddress(AddressInterface $billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    public function getBillingAddress(): AddressInterface
    {
        return $this->billingAddress;
    }
}
