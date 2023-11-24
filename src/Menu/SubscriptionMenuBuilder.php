<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class SubscriptionMenuBuilder
{
    public function buildMenu(MenuBuilderEvent $menuBuilderEvent): void
    {
        $menu = $menuBuilderEvent->getMenu();

        $subscriptionSubMenu = $menu
            ->addChild('subscription')
            ->setLabel('motherbrain_sylius_product_subscription_plugin.ui.subscriptions');

        $subscriptionSubMenu
            ->addChild('plan', [
                'route' => 'motherbrain_sylius_product_subscription_plugin_admin_plan_index'
            ])
            ->setLabel('motherbrain_sylius_product_subscription_plugin.ui.plans');
    }
}
