<?php

namespace Motherbrain\SyliusProductSubscriptionPlugin\ApiPlatform\CommandHandler;

use Motherbrain\SyliusProductSubscriptionPlugin\ApiPlatform\Command\SelectPlan;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Webmozart\Assert\Assert;

final class SelectPlanHandler implements MessageHandlerInterface
{
    public function __construct(
        private RepositoryInterface $planRepository
    ) {
    }

    public function __invoke(SelectPlan $selectPlan): array
    {
        $plan = $this->planRepository->find($selectPlan->getPlanId());
        Assert::notNull($plan);

        return [];
    }
}
