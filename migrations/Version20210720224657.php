<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210720224657 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE administrador_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE alumno_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE banco_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cheque_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cuenta_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE deposito_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ejercicio_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE empresa_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE operacion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE plan_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE puntaje_intento_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE servicio_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sucursal_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tipo_operacion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tipo_plan_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tipo_servicio_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE administrador_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE alumno_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE banco_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cheque_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cuenta_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE deposito_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ejercicio_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE empresa_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE operacion_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE plan_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE puntaje_intento_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE servicio_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sucursal_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tipo_operacion_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tipo_plan_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tipo_servicio_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
    }
}
