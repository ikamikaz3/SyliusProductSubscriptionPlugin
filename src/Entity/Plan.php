<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;
use Sylius\Component\Resource\Model\ToggleableTrait;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslationInterface;

class Plan implements PlanInterface
{
    use ToggleableTrait;
    use TimestampableTrait;
    use TranslatableTrait {
        __construct as protected initializeTranslationsCollection;
    }

    /** @var int|null */
    protected $id;

    /** @var string|null */
    protected $code;

    /** @var PlanGatewayConfigInterface|null */
    protected $planGatewayConfig;

    /** @var ProductInterface|null */
    protected $product;

    public function __construct()
    {
        $this->initializeTranslationsCollection();
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

    public function setPlanGatewayConfig(PlanGatewayConfigInterface $planGatewayConfig): void
    {
        $this->planGatewayConfig = $planGatewayConfig;
    }

    public function getPlanGatewayConfig(): ?PlanGatewayConfigInterface
    {
        return $this->planGatewayConfig;
    }

    public function setProduct(?ProductInterface $product): void
    {
        $this->product = $product;
    }

    public function getProduct(): ?ProductInterface
    {
        return $this->product;
    }

    protected function getPlanTranslation(): TranslationInterface
    {
        return $this->createTranslation();
    }

    protected function createTranslation(): PlanTranslationInterface
    {
        return new PlanTranslation();
    }
}
