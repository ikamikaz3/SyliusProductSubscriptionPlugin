<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

trait SubscribableTrait
{
    /** @var bool|null */
    protected $subscription = false;

    public function isSubscription(): bool
    {
        return $this->subscription;
    }

    public function getSubscription(): bool
    {
        return $this->subscription;
    }

    public function setSubscription(?bool $subscription): void
    {
        $this->subscription = (bool)$subscription;
    }
}
