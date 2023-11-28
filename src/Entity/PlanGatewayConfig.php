<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

class PlanGatewayConfig implements PlanGatewayConfigInterface
{
    /** @var int|null */
    private $id;

    /** @var array */
    private $config = [];

    /** @var string|null */
    private $gatewayName;

    /** @var string|null */
    private $factoryName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConfig(): array
    {
        return $this->config;
    }

    public function setConfig(array $config): void
    {
        $this->config = $config;
    }

    public function getGatewayName(): ?string
    {
        return $this->gatewayName;
    }

    public function setGatewayName(string $gatewayName): void
    {
        $this->gatewayName = $gatewayName;
    }

    public function getFactoryName(): ?string
    {
        return $this->factoryName;
    }

    public function setFactoryName(string $factoryName): void
    {
        $this->factoryName = $factoryName;
    }
}
