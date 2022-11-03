<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031143924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, idtest INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_participant (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7E84A284F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE campus ADD id INT AUTO_INCREMENT NOT NULL, ADD id_campus INT NOT NULL, ADD campus VARCHAR(255) DEFAULT NULL, DROP idCampus, CHANGE nom nom VARCHAR(255) DEFAULT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE etat ADD id INT AUTO_INCREMENT NOT NULL, ADD id_etat INT NOT NULL, DROP idEtat, CHANGE libelle libelle VARCHAR(255) DEFAULT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE lieu ADD id INT AUTO_INCREMENT NOT NULL, ADD id_lieu INT NOT NULL, DROP idLieu, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE rue rue VARCHAR(255) DEFAULT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE participant ADD id INT AUTO_INCREMENT NOT NULL, ADD id_participant INT NOT NULL, ADD mot_passe VARCHAR(255) NOT NULL, ADD administratif TINYINT(1) NOT NULL, DROP idParticipant, DROP motPasse, DROP administrateur, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone VARCHAR(15) DEFAULT NULL, CHANGE mail mail VARCHAR(255) NOT NULL, CHANGE actif actif TINYINT(1) NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE sortie ADD id INT AUTO_INCREMENT NOT NULL, ADD date_heure_debut DATETIME NOT NULL, ADD date_limite_inscription DATETIME NOT NULL, ADD infos_sortie VARCHAR(255) DEFAULT NULL, DROP dateHeureDebut, DROP dateLimiteInscription, DROP infosSortie, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE durée durée INT DEFAULT NULL, CHANGE etat etat VARCHAR(255) DEFAULT NULL, CHANGE nbInscriptionsMax id_sortie INT NOT NULL, CHANGE idSortie nb_inscription_max INT DEFAULT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE ville ADD id INT AUTO_INCREMENT NOT NULL, ADD id_ville INT NOT NULL, ADD code_postal VARCHAR(10) NOT NULL, DROP idVille, DROP codePostal, CHANGE nom nom VARCHAR(255) DEFAULT NULL, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_participant');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE campus MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON campus');
        $this->addSql('ALTER TABLE campus ADD idCampus INT DEFAULT NULL, DROP id, DROP id_campus, DROP campus, CHANGE nom nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE etat MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON etat');
        $this->addSql('ALTER TABLE etat ADD idEtat INT DEFAULT NULL, DROP id, DROP id_etat, CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE lieu MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON lieu');
        $this->addSql('ALTER TABLE lieu ADD idLieu INT DEFAULT NULL, DROP id, DROP id_lieu, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE rue rue VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE participant MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON participant');
        $this->addSql('ALTER TABLE participant ADD idParticipant INT DEFAULT NULL, ADD motPasse VARCHAR(255) DEFAULT \'NULL\', ADD administrateur TINYINT(1) DEFAULT NULL, DROP id, DROP id_participant, DROP mot_passe, DROP administratif, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE telephone telephone VARCHAR(255) NOT NULL, CHANGE mail mail VARCHAR(255) DEFAULT \'NULL\', CHANGE actif actif TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE sortie MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON sortie');
        $this->addSql('ALTER TABLE sortie ADD dateHeureDebut DATETIME NOT NULL, ADD dateLimiteInscription DATETIME NOT NULL, ADD infosSortie VARCHAR(255) NOT NULL, DROP id, DROP date_heure_debut, DROP date_limite_inscription, DROP infos_sortie, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE durée durée INT NOT NULL, CHANGE etat etat VARCHAR(255) NOT NULL, CHANGE nb_inscription_max idSortie INT DEFAULT NULL, CHANGE id_sortie nbInscriptionsMax INT NOT NULL');
        $this->addSql('ALTER TABLE ville MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON ville');
        $this->addSql('ALTER TABLE ville ADD idVille INT DEFAULT NULL, ADD codePostal VARCHAR(255) NOT NULL, DROP id, DROP id_ville, DROP code_postal, CHANGE nom nom VARCHAR(255) NOT NULL');
    }
}
