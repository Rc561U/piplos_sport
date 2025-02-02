<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250202210637 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, sportsman_id INT NOT NULL, tournament_table_id INT NOT NULL, INDEX IDX_741D53CD8FC1F881 (sportsman_id), INDEX IDX_741D53CDC41CEB9 (tournament_table_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD8FC1F881 FOREIGN KEY (sportsman_id) REFERENCES sportsman (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDC41CEB9 FOREIGN KEY (tournament_table_id) REFERENCES tournament_table (id)');
        $this->addSql('ALTER TABLE tournament_table DROP FOREIGN KEY FK_377F1F5F8FC1F881');
        $this->addSql('DROP INDEX IDX_377F1F5F8FC1F881 ON tournament_table');
        $this->addSql('ALTER TABLE tournament_table DROP sportsman_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD8FC1F881');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDC41CEB9');
        $this->addSql('DROP TABLE place');
        $this->addSql('ALTER TABLE tournament_table ADD sportsman_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tournament_table ADD CONSTRAINT FK_377F1F5F8FC1F881 FOREIGN KEY (sportsman_id) REFERENCES sportsman (id)');
        $this->addSql('CREATE INDEX IDX_377F1F5F8FC1F881 ON tournament_table (sportsman_id)');
    }
}
