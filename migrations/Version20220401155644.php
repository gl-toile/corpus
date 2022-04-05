<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220401155644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artwork (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, ref VARCHAR(255) DEFAULT NULL, width NUMERIC(5, 2) DEFAULT NULL, height NUMERIC(6, 2) DEFAULT NULL, is_to_sold TINYINT(1) NOT NULL, is_sold TINYINT(1) NOT NULL, price NUMERIC(10, 2) DEFAULT NULL, creation_date DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, description LONGTEXT DEFAULT NULL, is_in_corpus TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, main_image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
       $this->addSql('DROP TABLE artwork');
    }
}
