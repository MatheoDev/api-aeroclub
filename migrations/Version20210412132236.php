<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412132236 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE membres ADD uueract_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE membres ADD CONSTRAINT FK_594AE39CCA453566 FOREIGN KEY (uueract_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_594AE39CCA453566 ON membres (uueract_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE membres DROP CONSTRAINT FK_594AE39CCA453566');
        $this->addSql('DROP INDEX UNIQ_594AE39CCA453566');
        $this->addSql('ALTER TABLE membres DROP uueract_id');
    }
}
