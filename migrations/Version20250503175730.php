<?php

declare(strict_types=1);

namespace MyProject\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250503175730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE admin (Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, Password VARCHAR(255) NOT NULL, Email VARCHAR(255) NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE post (Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, Num_Report INTEGER NOT NULL, Description VARCHAR(255) NOT NULL, Accepted_Pet VARCHAR(255) NOT NULL, Price NUMERIC(10, 8) NOT NULL, title VARCHAR(255) NOT NULL, More_Info VARCHAR(255) NOT NULL, longitude NUMERIC(11, 8) NOT NULL, latitude NUMERIC(10, 8) NOT NULL, Date_in DATETIME NOT NULL, Date_out DATETIME NOT NULL, Costumer_id INTEGER DEFAULT NULL, Seller_id INTEGER DEFAULT NULL, CONSTRAINT FK_5A8A6C8DE62B9E85 FOREIGN KEY (Costumer_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5A8A6C8DF19A27A FOREIGN KEY (Seller_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5A8A6C8DE62B9E85 ON post (Costumer_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5A8A6C8DF19A27A ON post (Seller_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE report (Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, Id_Reporter INTEGER NOT NULL, Id_Reported INTEGER NOT NULL, Description VARCHAR(255) NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE review (Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, Id_Reviewer INTEGER NOT NULL, Id_Reviewed INTEGER NOT NULL, Description VARCHAR(255) NOT NULL, Rating INTEGER NOT NULL, Reviewer_id INTEGER DEFAULT NULL, eviewed_id INTEGER DEFAULT NULL, CONSTRAINT FK_794381C6F6CBC9C1 FOREIGN KEY (Reviewer_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_794381C62B667CFD FOREIGN KEY (eviewed_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_794381C6F6CBC9C1 ON review (Reviewer_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_794381C62B667CFD ON review (eviewed_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, verified BOOLEAN NOT NULL, rating INTEGER NOT NULL, tel INTEGER NOT NULL, longitude NUMERIC(11, 8) NOT NULL, latitude NUMERIC(10, 8) NOT NULL)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE admin
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE post
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE report
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE review
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user
        SQL);
    }
}
