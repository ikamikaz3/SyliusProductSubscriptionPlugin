<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;
use Sylius\Component\Resource\Model\ToggleableTrait;

class Plan implements PlanInterface
{
    use ToggleableTrait;
    use TimestampableTrait;

    protected ?int $id = null;

    protected ?string $name = null;

    protected array $config = [];

    protected Collection $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(ProductInterface $product): void
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
        }
    }

    public function removeProduct(ProductInterface $product): void
    {
        $this->products->removeElement($product);
    }

    public function setConfig(array $config): void
    {
        $this->config = $config;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}
