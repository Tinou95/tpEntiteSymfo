<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241220122756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE topic DROP CONSTRAINT fk_9d40de1ba76ed395');
        $this->addSql('DROP SEQUENCE app_user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE article_id_seq CASCADE');
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('DROP TABLE app_user');
        $this->addSql('ALTER TABLE category DROP description');
        $this->addSql('ALTER TABLE category ALTER name TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE reply DROP created_at');
        $this->addSql('ALTER TABLE reply ALTER topic_id DROP NOT NULL');
        $this->addSql('DROP INDEX idx_9d40de1ba76ed395');
        $this->addSql('ALTER TABLE topic DROP user_id');
        $this->addSql('ALTER TABLE topic DROP created_at');
        $this->addSql('ALTER TABLE topic ALTER category_id DROP NOT NULL');
        $this->addSql('ALTER TABLE topic ALTER content TYPE TEXT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE app_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE article_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE app_user (id SERIAL NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_88bdf3e9e7927c74 ON app_user (email)');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('ALTER TABLE reply ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE reply ALTER topic_id SET NOT NULL');
        $this->addSql('ALTER TABLE topic ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE topic ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE topic ALTER category_id SET NOT NULL');
        $this->addSql('ALTER TABLE topic ALTER content TYPE VARCHAR(255)');
        $this->addSql('COMMENT ON COLUMN topic.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE topic ADD CONSTRAINT fk_9d40de1ba76ed395 FOREIGN KEY (user_id) REFERENCES app_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_9d40de1ba76ed395 ON topic (user_id)');
        $this->addSql('ALTER TABLE category ADD description TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ALTER name TYPE VARCHAR(255)');
    }
}
