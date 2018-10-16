<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181016082155 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE followed_advisor DROP FOREIGN KEY followed_advisor_ibfk_1');
        $this->addSql('ALTER TABLE followed_unemployment_fund DROP FOREIGN KEY followed_unemployment_fund_ibfk_1');
        $this->addSql('DROP TABLE followed_advisor');
        $this->addSql('DROP TABLE followed_unemployment_fund');
        $this->addSql('DROP TABLE orp');
        $this->addSql('DROP TABLE unemployment_fund');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE followed_advisor (id_fa INT AUTO_INCREMENT NOT NULL, id_orp INT NOT NULL, id_candidate INT NOT NULL, registration_date DATETIME NOT NULL, INDEX id_orp (id_orp), INDEX id_candidate (id_candidate), PRIMARY KEY(id_fa)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE followed_unemployment_fund (id_fuf INT AUTO_INCREMENT NOT NULL, id_candidate INT NOT NULL, id_unemployment_fund INT NOT NULL, INDEX id_unemployment_fund (id_unemployment_fund), INDEX id_candidate (id_candidate), PRIMARY KEY(id_fuf)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orp (id_orp INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, prename VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, gender VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, street VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, adresse VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, postal_code VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, city VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, email VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, birthday VARCHAR(45) DEFAULT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(id_orp)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unemployment_fund (id_unemployment_fund INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL COLLATE latin1_swedish_ci, street VARCHAR(45) DEFAULT NULL COLLATE latin1_swedish_ci, adresse VARCHAR(45) DEFAULT NULL COLLATE latin1_swedish_ci, postal_code VARCHAR(45) DEFAULT NULL COLLATE latin1_swedish_ci, city VARCHAR(45) DEFAULT NULL COLLATE latin1_swedish_ci, email VARCHAR(45) DEFAULT NULL COLLATE latin1_swedish_ci, phone_number VARCHAR(45) DEFAULT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(id_unemployment_fund)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE followed_advisor ADD CONSTRAINT followed_advisor_ibfk_1 FOREIGN KEY (id_orp) REFERENCES orp (id_orp) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE followed_advisor ADD CONSTRAINT followed_advisor_ibfk_2 FOREIGN KEY (id_candidate) REFERENCES candidat (id_candidate) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE followed_unemployment_fund ADD CONSTRAINT followed_unemployment_fund_ibfk_1 FOREIGN KEY (id_unemployment_fund) REFERENCES unemployment_fund (id_unemployment_fund) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE followed_unemployment_fund ADD CONSTRAINT followed_unemployment_fund_ibfk_2 FOREIGN KEY (id_candidate) REFERENCES candidat (id_candidate) ON DELETE CASCADE');
    }
}
