<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240321114120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job_job_type (job_id INT NOT NULL, job_type_id INT NOT NULL, INDEX IDX_6C558413BE04EA9 (job_id), INDEX IDX_6C5584135FA33B08 (job_type_id), PRIMARY KEY(job_id, job_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_user (job_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_A5FA008BE04EA9 (job_id), INDEX IDX_A5FA008A76ED395 (user_id), PRIMARY KEY(job_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job_job_type ADD CONSTRAINT FK_6C558413BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_job_type ADD CONSTRAINT FK_6C5584135FA33B08 FOREIGN KEY (job_type_id) REFERENCES job_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_user ADD CONSTRAINT FK_A5FA008BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_user ADD CONSTRAINT FK_A5FA008A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job ADD category_id INT DEFAULT NULL, ADD company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_FBD8E0F812469DE2 ON job (category_id)');
        $this->addSql('CREATE INDEX IDX_FBD8E0F8979B1AD6 ON job (company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_job_type DROP FOREIGN KEY FK_6C558413BE04EA9');
        $this->addSql('ALTER TABLE job_job_type DROP FOREIGN KEY FK_6C5584135FA33B08');
        $this->addSql('ALTER TABLE job_user DROP FOREIGN KEY FK_A5FA008BE04EA9');
        $this->addSql('ALTER TABLE job_user DROP FOREIGN KEY FK_A5FA008A76ED395');
        $this->addSql('DROP TABLE job_job_type');
        $this->addSql('DROP TABLE job_user');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F812469DE2');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8979B1AD6');
        $this->addSql('DROP INDEX IDX_FBD8E0F812469DE2 ON job');
        $this->addSql('DROP INDEX IDX_FBD8E0F8979B1AD6 ON job');
        $this->addSql('ALTER TABLE job DROP category_id, DROP company_id');
    }
}
