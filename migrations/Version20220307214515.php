<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220307214515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E418C74DA76ED395 ON exercice (user_id)');
        $this->addSql('ALTER TABLE regime ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE regime ADD CONSTRAINT FK_AA864A7C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_AA864A7C9D86650F ON regime (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74DA76ED395');
        $this->addSql('DROP INDEX IDX_E418C74DA76ED395 ON exercice');
        $this->addSql('ALTER TABLE exercice CHANGE code code VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mouvement mouvement VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE regime DROP FOREIGN KEY FK_AA864A7C9D86650F');
        $this->addSql('DROP INDEX IDX_AA864A7C9D86650F ON regime');
        $this->addSql('ALTER TABLE regime DROP user_id_id, CHANGE aliments_autorises aliments_autorises LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE aliments_interdits aliments_interdits LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE petit_dejeuner petit_dejeuner LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE collation1 collation1 LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE dejeuner dejeuner LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE collation2 collation2 LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE diner diner LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE conseils conseils LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phonenumber phonenumber VARCHAR(8) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE wejhou wejhou VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE bio bio VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE firstname firstname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
