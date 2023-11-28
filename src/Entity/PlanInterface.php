<?php

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Resource\Model\CodeAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\Resource\Model\ToggleableInterface;

interface PlanInterface extends ResourceInterface, CodeAwareInterface, ToggleableInterface, TimestampableInterface
{
    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getPlanGatewayConfig(): ?PlanGatewayConfigInterface;

    public function setPlanGatewayConfig(PlanGatewayConfigInterface $planGatewayConfig): void;

    public function addProduct(ProductInterface $product): void;

    public function removeProduct(ProductInterface $product): void;

    public function getProducts(): Collection;
}
