<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Form\Type;

use Motherbrain\SyliusProductSubscriptionPlugin\Entity\Plan;
use Motherbrain\SyliusProductSubscriptionPlugin\Entity\PlanInterface;
use Sylius\Bundle\ProductBundle\Form\Type\ProductChoiceType;
use Sylius\Bundle\ResourceBundle\Form\EventSubscriber\AddCodeFormSubscriber;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Core\Model\PaymentMethodInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Valid;
use Webmozart\Assert\Assert;

final class PlanType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var PlanInterface $plan */
        $plan = $options['data'];
        $planGatewayConfig = $plan->getPlanGatewayConfig();

        $builder
            ->add('enabled', CheckboxType::class, [
                'required' => false
            ])
            ->add('planGatewayConfig', PlanGatewayConfigType::class, [
                'data' => $planGatewayConfig
            ])
            ->add('products', ProductChoiceType::class, [
                'multiple' => true
            ])
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => PlanTranslationType::class,
                'constraints' => [new Valid()]
            ])
            ->addEventSubscriber(new AddCodeFormSubscriber())
            ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event): void {
                $plan = $event->getData();

                if (!$plan instanceof PlanInterface) {
                    return;
                }

                $planGatewayConfig = $plan->getPlanGatewayConfig();
                Assert::notNull($planGatewayConfig);

                $gatewayName = $planGatewayConfig->getGatewayName();

                $planCode = $plan->getCode();
                if (null === $gatewayName && null !== $planCode) {
                    $planGatewayConfig->setGatewayName(StringInflector::nameToLowercaseCode($planCode));
                }
            });
    }

    public function getBlockPrefix(): string
    {
        return 'motherbrain_sylius_product_subscription_plugin_plan';
    }
}
