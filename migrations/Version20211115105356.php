<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211115105356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aeroport (id INT AUTO_INCREMENT NOT NULL, oaci VARCHAR(255) NOT NULL, aita VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, latitude VARCHAR(255) NOT NULL, longitude VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avion (id INT AUTO_INCREMENT NOT NULL, modele VARCHAR(255) NOT NULL, numero_serie VARCHAR(255) NOT NULL, code_interne VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mouvement (id INT AUTO_INCREMENT NOT NULL, aeroport_depart_id INT DEFAULT NULL, aeroport_arrivee_id INT DEFAULT NULL, avion_utilise_id INT DEFAULT NULL, code_vol VARCHAR(255) NOT NULL, numero_vol VARCHAR(255) NOT NULL, date_heure_depart DATETIME NOT NULL, date_heure_arrivee DATETIME NOT NULL, INDEX IDX_5B51FC3EE3CBAF6E (aeroport_depart_id), INDEX IDX_5B51FC3EA1B96354 (aeroport_arrivee_id), INDEX IDX_5B51FC3E44F52E71 (avion_utilise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE retard (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, le_mouvement_id INT DEFAULT NULL, commentaire VARCHAR(255) NOT NULL, duree INT NOT NULL, INDEX IDX_5C64DDBDC54C8C93 (type_id), INDEX IDX_5C64DDBD6198E8AD (le_mouvement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_retard (id INT AUTO_INCREMENT NOT NULL, code_situation VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mouvement ADD CONSTRAINT FK_5B51FC3EE3CBAF6E FOREIGN KEY (aeroport_depart_id) REFERENCES aeroport (id)');
        $this->addSql('ALTER TABLE mouvement ADD CONSTRAINT FK_5B51FC3EA1B96354 FOREIGN KEY (aeroport_arrivee_id) REFERENCES aeroport (id)');
        $this->addSql('ALTER TABLE mouvement ADD CONSTRAINT FK_5B51FC3E44F52E71 FOREIGN KEY (avion_utilise_id) REFERENCES avion (id)');
        $this->addSql('ALTER TABLE retard ADD CONSTRAINT FK_5C64DDBDC54C8C93 FOREIGN KEY (type_id) REFERENCES type_retard (id)');
        $this->addSql('ALTER TABLE retard ADD CONSTRAINT FK_5C64DDBD6198E8AD FOREIGN KEY (le_mouvement_id) REFERENCES mouvement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mouvement DROP FOREIGN KEY FK_5B51FC3EE3CBAF6E');
        $this->addSql('ALTER TABLE mouvement DROP FOREIGN KEY FK_5B51FC3EA1B96354');
        $this->addSql('ALTER TABLE mouvement DROP FOREIGN KEY FK_5B51FC3E44F52E71');
        $this->addSql('ALTER TABLE retard DROP FOREIGN KEY FK_5C64DDBD6198E8AD');
        $this->addSql('ALTER TABLE retard DROP FOREIGN KEY FK_5C64DDBDC54C8C93');
        $this->addSql('DROP TABLE aeroport');
        $this->addSql('DROP TABLE avion');
        $this->addSql('DROP TABLE mouvement');
        $this->addSql('DROP TABLE retard');
        $this->addSql('DROP TABLE type_retard');
    }
}
