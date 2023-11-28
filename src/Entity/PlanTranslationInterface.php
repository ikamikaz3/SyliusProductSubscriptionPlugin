<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslationInterface;

interface PlanTranslationInterface extends ResourceInterface, TranslationInterface
{
    public function getName(): ?string;

    public function setName(?string $name): void;
}
