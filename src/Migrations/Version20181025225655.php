<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181025225655 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidates CHANGE id_department id_department INT DEFAULT NULL');
        $this->addSql('ALTER TABLE unemployment_funds_candidates DROP FOREIGN KEY unemployment_funds_candidates_ibfk_1');
        $this->addSql('ALTER TABLE unemployment_funds_candidates DROP FOREIGN KEY unemployment_funds_candidates_ibfk_2');
        $this->addSql('ALTER TABLE unemployment_funds_candidates ADD CONSTRAINT FK_159271693A6E58E4 FOREIGN KEY (id_candidat) REFERENCES candidates (id_candidat)');
        $this->addSql('ALTER TABLE unemployment_funds_candidates ADD CONSTRAINT FK_159271699CCB5C97 FOREIGN KEY (id_unemployment_fund) REFERENCES unemployment_funds (id_unemployment_fund)');
        $this->addSql('ALTER TABLE unemployment_funds_candidates RENAME INDEX id_unemployment_fund TO IDX_159271699CCB5C97');
        $this->addSql('ALTER TABLE departments CHANGE id_country id_country INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidates_orps DROP FOREIGN KEY candidates_orps_ibfk_1');
        $this->addSql('ALTER TABLE candidates_orps DROP FOREIGN KEY candidates_orps_ibfk_2');
        $this->addSql('ALTER TABLE candidates_orps DROP registration_date');
        $this->addSql('ALTER TABLE candidates_orps ADD CONSTRAINT FK_E6EC83AD6F62D71D FOREIGN KEY (id_orp) REFERENCES orps (id_orp)');
        $this->addSql('ALTER TABLE candidates_orps ADD CONSTRAINT FK_E6EC83AD3A6E58E4 FOREIGN KEY (id_candidat) REFERENCES candidates (id_candidat)');
        $this->addSql('ALTER TABLE candidates_orps RENAME INDEX id_candidat TO IDX_E6EC83AD3A6E58E4');
        $this->addSql('ALTER TABLE unemployment_funds CHANGE id_department id_department INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidates CHANGE id_department id_department INT NOT NULL');
        $this->addSql('ALTER TABLE candidates_orps DROP FOREIGN KEY FK_E6EC83AD6F62D71D');
        $this->addSql('ALTER TABLE candidates_orps DROP FOREIGN KEY FK_E6EC83AD3A6E58E4');
        $this->addSql('ALTER TABLE candidates_orps ADD registration_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE candidates_orps ADD CONSTRAINT candidates_orps_ibfk_1 FOREIGN KEY (id_orp) REFERENCES orps (id_orp) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidates_orps ADD CONSTRAINT candidates_orps_ibfk_2 FOREIGN KEY (id_candidat) REFERENCES candidates (id_candidat) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidates_orps RENAME INDEX idx_e6ec83ad3a6e58e4 TO id_candidat');
        $this->addSql('ALTER TABLE departments CHANGE id_country id_country INT NOT NULL');
        $this->addSql('ALTER TABLE unemployment_funds CHANGE id_department id_department INT NOT NULL');
        $this->addSql('ALTER TABLE unemployment_funds_candidates DROP FOREIGN KEY FK_159271693A6E58E4');
        $this->addSql('ALTER TABLE unemployment_funds_candidates DROP FOREIGN KEY FK_159271699CCB5C97');
        $this->addSql('ALTER TABLE unemployment_funds_candidates ADD CONSTRAINT unemployment_funds_candidates_ibfk_1 FOREIGN KEY (id_unemployment_fund) REFERENCES unemployment_funds (id_unemployment_fund) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE unemployment_funds_candidates ADD CONSTRAINT unemployment_funds_candidates_ibfk_2 FOREIGN KEY (id_candidat) REFERENCES candidates (id_candidat) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE unemployment_funds_candidates RENAME INDEX idx_159271699ccb5c97 TO id_unemployment_fund');
    }
}
