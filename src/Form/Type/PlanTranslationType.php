<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class PlanTranslationType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class);
    }

    public function getBlockPrefix(): string
    {
        return 'motherbrain_sylius_product_subscription_plugin_plan_translation';
    }
}
