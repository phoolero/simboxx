<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201119141843 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE banco (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cheque (id INT AUTO_INCREMENT NOT NULL, cuenta_id INT DEFAULT NULL, serie INT NOT NULL, monto_numero INT DEFAULT NULL, monto_letras VARCHAR(255) DEFAULT NULL, tarjado_orden VARCHAR(2) NOT NULL, tarjado_al_portador VARCHAR(2) NOT NULL, beneficiario VARCHAR(255) DEFAULT NULL, firma_titular VARCHAR(255) DEFAULT NULL, firma_beneficiario_atravesada VARCHAR(255) DEFAULT NULL, cruzado VARCHAR(2) NOT NULL, cruzado_especial_banco VARCHAR(255) DEFAULT NULL, numero_dias_cheque INT DEFAULT NULL, numero_dias_revalidacion INT DEFAULT NULL, revalidacion_firma VARCHAR(255) DEFAULT NULL, endoso_deposito_cuenta VARCHAR(255) DEFAULT NULL, endoso_deposito_firma VARCHAR(255) DEFAULT NULL, endoso_deposito_rut VARCHAR(255) DEFAULT NULL, endoso_regular_firma VARCHAR(255) DEFAULT NULL, endoso_regular_rut VARCHAR(255) DEFAULT NULL, endoso_regular_nombre VARCHAR(255) DEFAULT NULL, error VARCHAR(255) DEFAULT NULL, INDEX IDX_A0BBFDE99AEFF118 (cuenta_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cuenta (id INT AUTO_INCREMENT NOT NULL, sucursal_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, rut VARCHAR(255) NOT NULL, firma VARCHAR(255) NOT NULL, INDEX IDX_31C7BFCF279A5D5E (sucursal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notitular (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, firma VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sucursal (id INT AUTO_INCREMENT NOT NULL, banco_id INT DEFAULT NULL, codigo_plaza INT NOT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_E99C6D56CC04A73E (banco_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cheque ADD CONSTRAINT FK_A0BBFDE99AEFF118 FOREIGN KEY (cuenta_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE cuenta ADD CONSTRAINT FK_31C7BFCF279A5D5E FOREIGN KEY (sucursal_id) REFERENCES sucursal (id)');
        $this->addSql('ALTER TABLE sucursal ADD CONSTRAINT FK_E99C6D56CC04A73E FOREIGN KEY (banco_id) REFERENCES banco (id)');
        $this->addSql('ALTER TABLE ejercicio DROP documento');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sucursal DROP FOREIGN KEY FK_E99C6D56CC04A73E');
        $this->addSql('ALTER TABLE cheque DROP FOREIGN KEY FK_A0BBFDE99AEFF118');
        $this->addSql('ALTER TABLE cuenta DROP FOREIGN KEY FK_31C7BFCF279A5D5E');
        $this->addSql('DROP TABLE banco');
        $this->addSql('DROP TABLE cheque');
        $this->addSql('DROP TABLE cuenta');
        $this->addSql('DROP TABLE notitular');
        $this->addSql('DROP TABLE sucursal');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE ejercicio ADD documento INT NOT NULL');
    }
}
