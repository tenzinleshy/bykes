<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171126161821 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, comment VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_request (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, specialist_id INT DEFAULT NULL, status enum(\'requested\', \'on_the_way\', \'in_progress\', \'done\', \'canceled\'), INDEX IDX_CDED26D49395C3F3 (customer_id), INDEX IDX_CDED26D47B100C1A (specialist_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialist (id INT AUTO_INCREMENT NOT NULL, firstName VARCHAR(255) NOT NULL, lastName VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_request ADD CONSTRAINT FK_CDED26D49395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE order_request ADD CONSTRAINT FK_CDED26D47B100C1A FOREIGN KEY (specialist_id) REFERENCES specialist (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_request DROP FOREIGN KEY FK_CDED26D49395C3F3');
        $this->addSql('ALTER TABLE order_request DROP FOREIGN KEY FK_CDED26D47B100C1A');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE order_request');
        $this->addSql('DROP TABLE specialist');
    }
}
