<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\ApiPlatform\DataTransformer;


use Motherbrain\SyliusProductSubscriptionPlugin\ApiPlatform\Command\PlanIdAwareInterface;
use Motherbrain\SyliusProductSubscriptionPlugin\Entity\PlanInterface;
use Sylius\Bundle\ApiBundle\DataTransformer\CommandDataTransformerInterface;
use Sylius\Component\Core\Model\OrderInterface;

final class PlanIdAwareCommandDataTransformer implements CommandDataTransformerInterface
{
    /**
     * @param PlanIdAwareInterface $object
     * @param string $to
     * @param array $context
     * @return PlanIdAwareInterface
     */
    public function transform($object, string $to, array $context = []): PlanIdAwareInterface
    {
        /** @var PlanInterface $plan */
        $plan = $context['object_to_populate'];

        $object->setPlanId((string)$plan->getId());

        return $object;
    }

    /**
     * @param PlanIdAwareInterface $object
     * @return bool
     */
    public function supportsTransformation($object): bool
    {
        return $object instanceof PlanIdAwareInterface;
    }
}
