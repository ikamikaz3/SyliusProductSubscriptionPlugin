@managing_plans
Feature: Adding a new plan
    As an Administrator

    Background:
        Given the store operates on a single channel in "United States"
        And I am logged in as an administrator

    @ui
    Scenario: Adding a new plan
        When I want to create a new plan with stripe gateway factory
        And I specify its code as "monthly-plan"
        And I name it "Monthly Plan" in "English (United States)"
        And I add it
        Then I should be notified that the plan has been successfully created
