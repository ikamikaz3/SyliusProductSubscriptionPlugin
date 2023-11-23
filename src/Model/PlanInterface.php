<?php

namespace src\Model;

use Payum\Core\Model\GatewayConfigInterface;
use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\ToggleableInterface;

interface PlanInterface extends ResourceInterface, ToggleableInterface
{
    public function setName(string $name);

    public function getName();

    public function addProduct(ProductInterface $product);

    public function removeProduct(ProductInterface $product);

    public function getProducts();
}
