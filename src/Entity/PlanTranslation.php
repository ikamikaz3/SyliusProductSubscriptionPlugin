<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

use Sylius\Component\Resource\Model\AbstractTranslation;

class PlanTranslation extends AbstractTranslation implements PlanTranslationInterface
{
    /** @var int */
    protected $id;

    /** @var string|null */
    protected $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}
