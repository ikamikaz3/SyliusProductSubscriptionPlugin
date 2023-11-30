<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

trait PlanAwareTrait
{
    /** @var PlanInterface|null */
    protected $plan;

    /**
     * @return PlanInterface|null
     */
    public function getPlan(): ?PlanInterface
    {
        return $this->plan;
    }

    public function setPlan(?PlanInterface $plan): void
    {
        $this->plan = $plan;
    }
}
