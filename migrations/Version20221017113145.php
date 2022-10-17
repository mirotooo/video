<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221017113145 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD firstname VARCHAR(50) NOT NULL, ADD lastname VARCHAR(50) NOT NULL, ADD create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD up_date_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE video ADD relation_id INT NOT NULL, ADD title VARCHAR(50) NOT NULL, ADD video_link VARCHAR(500) NOT NULL, ADD description LONGTEXT NOT NULL, ADD create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C3256915B FOREIGN KEY (relation_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2C3256915B ON video (relation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP firstname, DROP lastname, DROP create_at, DROP up_date_at');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C3256915B');
        $this->addSql('DROP INDEX IDX_7CC7DA2C3256915B ON video');
        $this->addSql('ALTER TABLE video DROP relation_id, DROP title, DROP video_link, DROP description, DROP create_at, DROP updated_at');
    }
}
