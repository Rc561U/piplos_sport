<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250202162905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, discipline_name VARCHAR(255) NOT NULL, discription VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, venue VARCHAR(255) NOT NULL, event_date DATE NOT NULL, tournament_table_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_B50A2CB1C41CEB9 (tournament_table_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE social_network (id INT AUTO_INCREMENT NOT NULL, world_athletic_link VARCHAR(255) DEFAULT NULL, link_name VARCHAR(255) NOT NULL, link_url VARCHAR(255) NOT NULL, sportsman_id INT NOT NULL, INDEX IDX_EFFF52218FC1F881 (sportsman_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE tournament_table (id INT AUTO_INCREMENT NOT NULL, sportsman_id INT DEFAULT NULL, INDEX IDX_377F1F5F8FC1F881 (sportsman_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1C41CEB9 FOREIGN KEY (tournament_table_id) REFERENCES tournament_table (id)');
        $this->addSql('ALTER TABLE social_network ADD CONSTRAINT FK_EFFF52218FC1F881 FOREIGN KEY (sportsman_id) REFERENCES sportsman (id)');
        $this->addSql('ALTER TABLE tournament_table ADD CONSTRAINT FK_377F1F5F8FC1F881 FOREIGN KEY (sportsman_id) REFERENCES sportsman (id)');
        $this->addSql('ALTER TABLE sportsman ADD sex VARCHAR(255) NOT NULL, ADD image_size INT DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL, CHANGE birthday birthday DATETIME NOT NULL, CHANGE name full_name VARCHAR(255) NOT NULL, CHANGE photo image_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB1C41CEB9');
        $this->addSql('ALTER TABLE social_network DROP FOREIGN KEY FK_EFFF52218FC1F881');
        $this->addSql('ALTER TABLE tournament_table DROP FOREIGN KEY FK_377F1F5F8FC1F881');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE social_network');
        $this->addSql('DROP TABLE tournament_table');
        $this->addSql('ALTER TABLE sportsman ADD name VARCHAR(255) NOT NULL, DROP full_name, DROP sex, DROP image_size, DROP updated_at, CHANGE birthday birthday DATE NOT NULL, CHANGE image_name photo VARCHAR(255) DEFAULT NULL');
    }
}
