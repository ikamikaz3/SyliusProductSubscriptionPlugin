<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

interface SubscribableInterface
{
    public function isSubscription(): bool;

    public function setSubscription(?bool $enabled): void;
}
