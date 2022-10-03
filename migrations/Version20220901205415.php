<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220901205415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       
        $this->addSql('ALTER TABLE articles CHANGE title title VARCHAR(50) NOT NULL, CHANGE content content VARCHAR(10000) NOT NULL, CHANGE auteur auteur VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE articles CHANGE title title VARCHAR(255) NOT NULL, CHANGE content content TEXT NOT NULL, CHANGE auteur auteur VARCHAR(255) NOT NULL');
    }
}
