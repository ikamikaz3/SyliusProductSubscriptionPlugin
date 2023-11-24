<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231124181110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE motherbrain_subscription_plan (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE motherbrain_plan_products (plan_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_12FF8F68E899029B (plan_id), INDEX IDX_12FF8F684584665A (product_id), PRIMARY KEY(plan_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE motherbrain_plan_products ADD CONSTRAINT FK_12FF8F68E899029B FOREIGN KEY (plan_id) REFERENCES motherbrain_subscription_plan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE motherbrain_plan_products ADD CONSTRAINT FK_12FF8F684584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE motherbrain_plan_products DROP FOREIGN KEY FK_12FF8F68E899029B');
        $this->addSql('ALTER TABLE motherbrain_plan_products DROP FOREIGN KEY FK_12FF8F684584665A');
        $this->addSql('DROP TABLE motherbrain_subscription_plan');
        $this->addSql('DROP TABLE motherbrain_plan_products');
    }
}
