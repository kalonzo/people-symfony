<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181016150557 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE candidat (id_candidate INT AUTO_INCREMENT NOT NULL, gender INT NOT NULL, prename VARCHAR(45) NOT NULL, street VARCHAR(45) NOT NULL, adresse VARCHAR(45) NOT NULL, postal_code VARCHAR(45) NOT NULL, city VARCHAR(45) NOT NULL, email VARCHAR(45) NOT NULL, birthday DATETIME NOT NULL, PRIMARY KEY(id_candidate)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE followed_advisor (id_fa INT AUTO_INCREMENT NOT NULL, id_orp INT DEFAULT NULL, id_candidate INT DEFAULT NULL, registration_date DATETIME NOT NULL, INDEX id_orp (id_orp), INDEX id_candidate (id_candidate), PRIMARY KEY(id_fa)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE followed_unemployment_fund (id_fuf INT AUTO_INCREMENT NOT NULL, id_unemployment_fund INT DEFAULT NULL, id_candidate INT DEFAULT NULL, INDEX id_unemployment_fund (id_unemployment_fund), INDEX id_candidate (id_candidate), PRIMARY KEY(id_fuf)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orp (id_orp INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, prename VARCHAR(45) NOT NULL, gender VARCHAR(45) NOT NULL, street VARCHAR(45) NOT NULL, adresse VARCHAR(45) NOT NULL, postal_code VARCHAR(45) NOT NULL, city VARCHAR(45) NOT NULL, email VARCHAR(45) NOT NULL, birthday VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id_orp)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unemployment_fund (id_unemployment_fund INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, street VARCHAR(45) DEFAULT NULL, adresse VARCHAR(45) DEFAULT NULL, postal_code VARCHAR(45) DEFAULT NULL, city VARCHAR(45) DEFAULT NULL, email VARCHAR(45) DEFAULT NULL, phone_number VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id_unemployment_fund)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE followed_advisor ADD CONSTRAINT FK_11E5089C6F62D71D FOREIGN KEY (id_orp) REFERENCES orp (id_orp)');
        $this->addSql('ALTER TABLE followed_advisor ADD CONSTRAINT FK_11E5089C48873263 FOREIGN KEY (id_candidate) REFERENCES candidat (id_candidate)');
        $this->addSql('ALTER TABLE followed_unemployment_fund ADD CONSTRAINT FK_C9E7F0309CCB5C97 FOREIGN KEY (id_unemployment_fund) REFERENCES unemployment_fund (id_unemployment_fund)');
        $this->addSql('ALTER TABLE followed_unemployment_fund ADD CONSTRAINT FK_C9E7F03048873263 FOREIGN KEY (id_candidate) REFERENCES candidat (id_candidate)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE followed_advisor DROP FOREIGN KEY FK_11E5089C48873263');
        $this->addSql('ALTER TABLE followed_unemployment_fund DROP FOREIGN KEY FK_C9E7F03048873263');
        $this->addSql('ALTER TABLE followed_advisor DROP FOREIGN KEY FK_11E5089C6F62D71D');
        $this->addSql('ALTER TABLE followed_unemployment_fund DROP FOREIGN KEY FK_C9E7F0309CCB5C97');
        $this->addSql('DROP TABLE candidat');
        $this->addSql('DROP TABLE followed_advisor');
        $this->addSql('DROP TABLE followed_unemployment_fund');
        $this->addSql('DROP TABLE orp');
        $this->addSql('DROP TABLE unemployment_fund');
    }
}
