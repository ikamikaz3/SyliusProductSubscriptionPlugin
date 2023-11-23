<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Form\Type;

use Motherbrain\SyliusProductSubscriptionPlugin\Entity\Plan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class PlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Plan::class
        ]);
    }
}
