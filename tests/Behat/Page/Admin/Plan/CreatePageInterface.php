<?php

declare(strict_types=1);

namespace Tests\Motherbrain\SyliusProductSubscriptionPlugin\Behat\Page\Admin\Plan;

use Sylius\Behat\Page\Admin\Crud\CreatePageInterface as BaseCreatePageInterface;

interface CreatePageInterface extends BaseCreatePageInterface
{
    public function nameIt(string $name, string $languageCode): void;
}
