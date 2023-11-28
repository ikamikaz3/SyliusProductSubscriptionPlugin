<?php

declare(strict_types=1);

namespace Tests\Motherbrain\SyliusProductSubscriptionPlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Sylius\Behat\NotificationType;
use Sylius\Behat\Service\NotificationCheckerInterface;
use Sylius\Behat\Service\Resolver\CurrentPageResolverInterface;
use Tests\Motherbrain\SyliusProductSubscriptionPlugin\Behat\Page\Admin\Plan\CreatePage;
use Tests\Motherbrain\SyliusProductSubscriptionPlugin\Behat\Page\Admin\Plan\CreatePageInterface;

final class ManagingPlansContext implements Context
{
    public function __construct(
        private CreatePage $createPage,
        private CurrentPageResolverInterface $currentPageResolver,
        private NotificationCheckerInterface $notificationChecker,
        private array $gatewayFactories
    ) {
    }

    /**
     * @When I want to create a new stripe plan
     * @When I want to create a new plan with :factory gateway factory
     */
    public function iWantToCreateANewPlan($factory = 'stripe'): void
    {
        $this->createPage->open(['factory' => array_search($factory, $this->gatewayFactories, true)]);
    }

    /**
     * @When I specify its code as :code
     * @When I do not specify its code
     */
    public function iSpecifyItsCodeAs(?string $code = null): void
    {
        $this->createPage->specifyCode($code ?? '');
    }

    /**
     * @When I name it :name in :language
     * @When I rename it to :name in :language
     * @When I remove its name from :language translation
     */
    public function iNameItIn(string $language, ?string $name = null): void
    {
        /** @var CreatePageInterface $currentPage */
        $currentPage = $this->currentPageResolver->getCurrentPageWithForm([$this->createPage]);

        $currentPage->nameIt($name ?? '', $language);
    }

    /**
     * @When I add it
     * @When I try to add it
     */
    public function iAddIt(): void
    {
        $this->createPage->create();
    }

    /**
     * @Then I should be notified that the plan has been successfully created
     */
    public function iShouldBeNotifiedThatThePlanHasBeenSuccessfullyCreated(): void
    {
        $this->notificationChecker->checkNotification(
            'Plan has been successfully created.',
            NotificationType::success(),
        );
    }
}
