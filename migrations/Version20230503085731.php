<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<<< HEAD:migrations/Version20230502111527.php
final class Version20230502111527 extends AbstractMigration
========
final class Version20230503085731 extends AbstractMigration
>>>>>>>> 89e4b301cda697a8b3e13facb40dc8aee97ea5bf:migrations/Version20230503085731.php
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
<<<<<<<< HEAD:migrations/Version20230502111527.php
        $this->addSql('CREATE TABLE nos_services (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, imagename VARCHAR(255) NOT NULL, lien VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
========
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL');
>>>>>>>> 89e4b301cda697a8b3e13facb40dc8aee97ea5bf:migrations/Version20230503085731.php
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
<<<<<<<< HEAD:migrations/Version20230502111527.php
        $this->addSql('DROP TABLE nos_services');
========
        $this->addSql('ALTER TABLE user DROP is_verified');
>>>>>>>> 89e4b301cda697a8b3e13facb40dc8aee97ea5bf:migrations/Version20230503085731.php
    }
}
