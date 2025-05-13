<?php

declare(strict_types=1);

namespace MyProject\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250507174713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE admin (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE offer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, state VARCHAR(255) NOT NULL, dateofferin DATETIME NOT NULL, dateofferout DATETIME NOT NULL, post INTEGER DEFAULT NULL, CONSTRAINT FK_29D6873E5A8A6C8D FOREIGN KEY (post) REFERENCES post (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_29D6873E5A8A6C8D ON offer (post)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE position (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, "desc" VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, longitude NUMERIC(11, 8) NOT NULL, latitude NUMERIC(10, 8) NOT NULL, owner INTEGER DEFAULT NULL, CONSTRAINT FK_462CE4F5CF60E67C FOREIGN KEY (owner) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_462CE4F5CF60E67C ON position (owner)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE post (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, Num_Report INTEGER NOT NULL, description VARCHAR(255) NOT NULL, Accepted_Pet VARCHAR(255) NOT NULL, price NUMERIC(10, 8) NOT NULL, title VARCHAR(255) NOT NULL, More_Info VARCHAR(255) NOT NULL, Date_in DATETIME NOT NULL, Date_out DATETIME NOT NULL, seller INTEGER DEFAULT NULL, house INTEGER DEFAULT NULL, CONSTRAINT FK_5A8A6C8DFB1AD3FC FOREIGN KEY (seller) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5A8A6C8D67D5399D FOREIGN KEY (house) REFERENCES position (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5A8A6C8DFB1AD3FC ON post (seller)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5A8A6C8D67D5399D ON post (house)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE report (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, description VARCHAR(255) NOT NULL, reporter INTEGER DEFAULT NULL, postreported INTEGER DEFAULT NULL, CONSTRAINT FK_C42F778476D6E0F2 FOREIGN KEY (reporter) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C42F7784CBA203ED FOREIGN KEY (postreported) REFERENCES post (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_C42F778476D6E0F2 ON report (reporter)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_C42F7784CBA203ED ON report (postreported)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE review (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, description VARCHAR(255) NOT NULL, rating INTEGER NOT NULL, reviewer INTEGER DEFAULT NULL, reviewed INTEGER DEFAULT NULL, id_offer INTEGER DEFAULT NULL, CONSTRAINT FK_794381C6E0472730 FOREIGN KEY (reviewer) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_794381C614939261 FOREIGN KEY (reviewed) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_794381C6C753C60E FOREIGN KEY (id_offer) REFERENCES offer (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_794381C6E0472730 ON review (reviewer)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_794381C614939261 ON review (reviewed)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_794381C6C753C60E ON review (id_offer)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, verified BOOLEAN NOT NULL, immagine BLOB NOT NULL, rating INTEGER NOT NULL, tel INTEGER NOT NULL)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE admin
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE offer
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE position
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
