<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251028204523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sale ADD status VARCHAR(20) NOT NULL, ADD customer_name VARCHAR(255) DEFAULT NULL, ADD customer_phone VARCHAR(255) DEFAULT NULL, ADD customer_address LONGTEXT DEFAULT NULL, ADD observations LONGTEXT DEFAULT NULL, CHANGE unit_price unit_price NUMERIC(12, 2) NOT NULL, CHANGE total_amount total_amount NUMERIC(12, 2) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sale DROP status, DROP customer_name, DROP customer_phone, DROP customer_address, DROP observations, CHANGE unit_price unit_price NUMERIC(10, 2) NOT NULL, CHANGE total_amount total_amount NUMERIC(10, 2) NOT NULL');
    }
}
