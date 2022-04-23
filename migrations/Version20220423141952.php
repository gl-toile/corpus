<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220423141952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE physical_location (id INT AUTO_INCREMENT NOT NULL, parent_location_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_1B556D166D6133FE (parent_location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE physical_location ADD CONSTRAINT FK_1B556D166D6133FE FOREIGN KEY (parent_location_id) REFERENCES physical_location (id)');
        $this->addSql('ALTER TABLE artwork ADD physical_location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC576B5B8AA78 FOREIGN KEY (physical_location_id) REFERENCES physical_location (id)');
        $this->addSql('CREATE INDEX IDX_881FC576B5B8AA78 ON artwork (physical_location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artwork DROP FOREIGN KEY FK_881FC576B5B8AA78');
        $this->addSql('ALTER TABLE physical_location DROP FOREIGN KEY FK_1B556D166D6133FE');
        $this->addSql('DROP TABLE physical_location');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP INDEX IDX_881FC576B5B8AA78 ON artwork');
        $this->addSql('ALTER TABLE artwork DROP physical_location_id');
    }
}
