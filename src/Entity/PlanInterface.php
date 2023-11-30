<?php

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Resource\Model\CodeAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\Resource\Model\ToggleableInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;

interface PlanInterface extends
    ResourceInterface,
    TranslatableInterface,
    CodeAwareInterface,
    ToggleableInterface,
    TimestampableInterface
{
    public function getPlanGatewayConfig(): ?PlanGatewayConfigInterface;

    public function setPlanGatewayConfig(PlanGatewayConfigInterface $planGatewayConfig): void;

    public function getProduct(): ?ProductInterface;

    public function setProduct(ProductInterface $product): void;
}
