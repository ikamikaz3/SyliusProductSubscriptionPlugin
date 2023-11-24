<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Controller;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class PlanController extends ResourceController
{
    public function getPlanGateways(Request $request, string $template): Response
    {
        return $this->render(
            $template,
            [
                'planFactories' => $this->getParameter('motherbrain_product_subscription_plugin.plan_factories'),
                'metadata' => $this->metadata,
            ],
        );
    }
}
