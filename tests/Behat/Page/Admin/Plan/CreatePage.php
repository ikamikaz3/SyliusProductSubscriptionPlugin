<?php

declare(strict_types=1);

namespace Tests\Motherbrain\SyliusProductSubscriptionPlugin\Behat\Page\Admin\Plan;

use Sylius\Behat\Behaviour\SpecifiesItsCode;
use Sylius\Behat\Page\Admin\Crud\CreatePage as BaseCreatePage;

class CreatePage extends BaseCreatePage implements CreatePageInterface
{
    use SpecifiesItsCode;

    public function nameIt(string $name, string $languageCode): void
    {
        $this->getDocument()->fillField(
            sprintf('motherbrain_sylius_product_subscription_plugin_plan_translations_%s_name', $languageCode),
            $name,
        );
    }
}
