<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419135206 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26FD79654D8');
        $this->addSql('DROP INDEX IDX_1D5EF26FD79654D8 ON movie');
        $this->addSql('ALTER TABLE movie CHANGE realistor_id realisator_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F139504F0 FOREIGN KEY (realisator_id) REFERENCES artiste (id)');
        $this->addSql('CREATE INDEX IDX_1D5EF26F139504F0 ON movie (realisator_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F139504F0');
        $this->addSql('DROP INDEX IDX_1D5EF26F139504F0 ON movie');
        $this->addSql('ALTER TABLE movie CHANGE realisator_id realistor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26FD79654D8 FOREIGN KEY (realistor_id) REFERENCES artiste (id)');
        $this->addSql('CREATE INDEX IDX_1D5EF26FD79654D8 ON movie (realistor_id)');
    }
}
