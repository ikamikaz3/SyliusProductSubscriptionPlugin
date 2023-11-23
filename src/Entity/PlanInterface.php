<?php

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\Resource\Model\ToggleableInterface;

interface PlanInterface extends ResourceInterface, ToggleableInterface, TimestampableInterface
{
    public function setName(?string $name): void;

    public function getName(): ?string;

    public function setConfig(array $config): void;

    public function getConfig(): array;

    public function addProduct(ProductInterface $product): void;

    public function removeProduct(ProductInterface $product): void;

    public function getProducts(): Collection;
}
