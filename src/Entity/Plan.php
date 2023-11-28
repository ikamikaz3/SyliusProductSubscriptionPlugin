<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Order\Model\OrderItemInterface;
use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;
use Sylius\Component\Resource\Model\ToggleableTrait;

class Plan implements PlanInterface
{
    use ToggleableTrait;
    use TimestampableTrait;

    /** @var int|null */
    protected $id;

    /** @var string|null */
    protected $code;

    /** @var string|null */
    protected $name;

    /** @var PlanGatewayConfigInterface|null */
    protected $planGatewayConfig;

    /**
     * @var Collection|ProductInterface[]
     *
     * @psalm-var Collection<array-key, ProductInterface>
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setPlanGatewayConfig(PlanGatewayConfigInterface $planGatewayConfig): void
    {
        $this->planGatewayConfig = $planGatewayConfig;
    }

    public function getPlanGatewayConfig(): ?PlanGatewayConfigInterface
    {
        return $this->planGatewayConfig;
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
}
