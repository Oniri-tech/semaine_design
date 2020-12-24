<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201222151218 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message ADD chatroom_id INT NOT NULL, CHANGE sent_at sent_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FCAF8A031 FOREIGN KEY (chatroom_id) REFERENCES chatroom (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FCAF8A031 ON message (chatroom_id)');
        $this->addSql('ALTER TABLE user ADD username VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FCAF8A031');
        $this->addSql('DROP INDEX IDX_B6BD307FCAF8A031 ON message');
        $this->addSql('ALTER TABLE message DROP chatroom_id, CHANGE sent_at sent_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user DROP username');
    }
}
