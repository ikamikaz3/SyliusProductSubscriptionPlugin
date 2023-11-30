<?php

declare(strict_types=1);

namespace Tests\Motherbrain\SyliusProductSubscriptionPlugin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Motherbrain\SyliusProductSubscriptionPlugin\Entity\SubscribableInterface;
use Motherbrain\SyliusProductSubscriptionPlugin\Entity\SubscribableTrait;
use Sylius\Component\Core\Model\Product as BaseProduct;

/**
 * @ORM\Entity()
 * @ORM\Table(name="sylius_product")
 */
class Product extends BaseProduct implements SubscribableInterface
{
    use SubscribableTrait;
}
