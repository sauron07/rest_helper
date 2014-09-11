<?php

namespace TravisDoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140911133901 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $table = $schema->createTable('user');
        $table->addColumn('user_name', 'string');
        $table->addColumn('password', 'string');
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('user');
    }
}
