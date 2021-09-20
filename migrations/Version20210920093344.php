<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210920093344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE curso (id INT AUTO_INCREMENT NOT NULL, profesor_id INT NOT NULL, titulo VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, url_foto VARCHAR(255) NOT NULL, INDEX IDX_CA3B40ECE52BD977 (profesor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nivel (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paso (id INT AUTO_INCREMENT NOT NULL, profesor_id INT NOT NULL, nivel_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, url_foto VARCHAR(255) NOT NULL, url_video VARCHAR(255) NOT NULL, gratis TINYINT(1) NOT NULL, nuevo TINYINT(1) NOT NULL, duracion VARCHAR(255) NOT NULL, INDEX IDX_DA71886BE52BD977 (profesor_id), UNIQUE INDEX UNIQ_DA71886BDA3426AE (nivel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE precio (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, importe NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profesor (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, estilo VARCHAR(255) NOT NULL, url_foto VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suscripcion (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, precio_id INT NOT NULL, transaccion VARCHAR(255) NOT NULL, fecha_creacion DATE NOT NULL, fecha_fin_suscripcion DATE DEFAULT NULL, INDEX IDX_497FA0DB38439E (usuario_id), UNIQUE INDEX UNIQ_497FA0C156B16B (precio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, passwort_reset_token VARCHAR(255) NOT NULL, password_reset_expires_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', activation_token VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) NOT NULL, is_admin TINYINT(1) NOT NULL, is_suscrito TINYINT(1) NOT NULL, fecha_registro DATE NOT NULL, fecha_fin_suscripcion DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE curso ADD CONSTRAINT FK_CA3B40ECE52BD977 FOREIGN KEY (profesor_id) REFERENCES profesor (id)');
        $this->addSql('ALTER TABLE paso ADD CONSTRAINT FK_DA71886BE52BD977 FOREIGN KEY (profesor_id) REFERENCES profesor (id)');
        $this->addSql('ALTER TABLE paso ADD CONSTRAINT FK_DA71886BDA3426AE FOREIGN KEY (nivel_id) REFERENCES nivel (id)');
        $this->addSql('ALTER TABLE suscripcion ADD CONSTRAINT FK_497FA0DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE suscripcion ADD CONSTRAINT FK_497FA0C156B16B FOREIGN KEY (precio_id) REFERENCES precio (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE paso DROP FOREIGN KEY FK_DA71886BDA3426AE');
        $this->addSql('ALTER TABLE suscripcion DROP FOREIGN KEY FK_497FA0C156B16B');
        $this->addSql('ALTER TABLE curso DROP FOREIGN KEY FK_CA3B40ECE52BD977');
        $this->addSql('ALTER TABLE paso DROP FOREIGN KEY FK_DA71886BE52BD977');
        $this->addSql('ALTER TABLE suscripcion DROP FOREIGN KEY FK_497FA0DB38439E');
        $this->addSql('DROP TABLE curso');
        $this->addSql('DROP TABLE nivel');
        $this->addSql('DROP TABLE paso');
        $this->addSql('DROP TABLE precio');
        $this->addSql('DROP TABLE profesor');
        $this->addSql('DROP TABLE suscripcion');
        $this->addSql('DROP TABLE usuario');
    }
}
