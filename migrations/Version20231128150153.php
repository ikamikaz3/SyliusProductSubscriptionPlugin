<?php

declare(strict_types=1);

namespace Motherbrain\SyliusProductSubscriptionPlugin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231128150153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE motherbrain_subscription_plan (id INT AUTO_INCREMENT NOT NULL, gateway_config_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_CD4DA5A477153098 (code), INDEX IDX_CD4DA5A4F23D6140 (gateway_config_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE motherbrain_plan_products (plan_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_12FF8F68E899029B (plan_id), INDEX IDX_12FF8F684584665A (product_id), PRIMARY KEY(plan_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE motherbrain_subscription_plan_gateway_config (id INT AUTO_INCREMENT NOT NULL, config JSON NOT NULL, factory_name VARCHAR(255) NOT NULL, gateway_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE motherbrain_subscription_plan_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_33C206F32C2AC5D3 (translatable_id), UNIQUE INDEX motherbrain_subscription_plan_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE motherbrain_subscription_plan ADD CONSTRAINT FK_CD4DA5A4F23D6140 FOREIGN KEY (gateway_config_id) REFERENCES motherbrain_subscription_plan_gateway_config (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE motherbrain_plan_products ADD CONSTRAINT FK_12FF8F68E899029B FOREIGN KEY (plan_id) REFERENCES motherbrain_subscription_plan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE motherbrain_plan_products ADD CONSTRAINT FK_12FF8F684584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id)');
        $this->addSql('ALTER TABLE motherbrain_subscription_plan_translation ADD CONSTRAINT FK_33C206F32C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES motherbrain_subscription_plan (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE motherbrain_subscription_plan DROP FOREIGN KEY FK_CD4DA5A4F23D6140');
        $this->addSql('ALTER TABLE motherbrain_plan_products DROP FOREIGN KEY FK_12FF8F68E899029B');
        $this->addSql('ALTER TABLE motherbrain_plan_products DROP FOREIGN KEY FK_12FF8F684584665A');
        $this->addSql('ALTER TABLE motherbrain_subscription_plan_translation DROP FOREIGN KEY FK_33C206F32C2AC5D3');
        $this->addSql('DROP TABLE motherbrain_subscription_plan');
        $this->addSql('DROP TABLE motherbrain_plan_products');
        $this->addSql('DROP TABLE motherbrain_subscription_plan_gateway_config');
        $this->addSql('DROP TABLE motherbrain_subscription_plan_translation');
    }
}
