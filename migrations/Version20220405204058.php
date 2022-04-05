<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405204058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artwork_corpus (artwork_id INT NOT NULL, corpus_id INT NOT NULL, INDEX IDX_D7B082ABDB8FFA4 (artwork_id), INDEX IDX_D7B082AB2B41ABF4 (corpus_id), PRIMARY KEY(artwork_id, corpus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corpus (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artwork_corpus ADD CONSTRAINT FK_D7B082ABDB8FFA4 FOREIGN KEY (artwork_id) REFERENCES artwork (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artwork_corpus ADD CONSTRAINT FK_D7B082AB2B41ABF4 FOREIGN KEY (corpus_id) REFERENCES corpus (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artwork_corpus DROP FOREIGN KEY FK_D7B082AB2B41ABF4');
        $this->addSql('DROP TABLE artwork_corpus');
        $this->addSql('DROP TABLE corpus');
    }
}
