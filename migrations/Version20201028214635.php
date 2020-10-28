<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201028214635 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE addresses (id INT AUTO_INCREMENT NOT NULL, landlord_id INT NOT NULL, university_accommodation_yn TINYINT(1) NOT NULL, line_1_number_building VARCHAR(255) NOT NULL, line_2_number_street VARCHAR(255) NOT NULL, line_3_area_locality VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, state_province_country VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, other_address_details LONGTEXT DEFAULT NULL, INDEX IDX_6FCA7516D48E7AED (landlord_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classes (id INT AUTO_INCREMENT NOT NULL, class_name VARCHAR(255) NOT NULL, class_description LONGTEXT DEFAULT NULL, other_details LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parents_and_guardians (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, gender VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, middle_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) NOT NULL, cell_mobile_number VARCHAR(255) NOT NULL, email_address VARCHAR(255) NOT NULL, other_details LONGTEXT DEFAULT NULL, INDEX IDX_2FBF57D1F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_owners (id INT AUTO_INCREMENT NOT NULL, landlord_name VARCHAR(255) NOT NULL, date_first_rental DATE NOT NULL, other_landlord_details LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ref_address_types (id INT AUTO_INCREMENT NOT NULL, address_type_code VARCHAR(255) NOT NULL, address_type_description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ref_payement_methods (id INT AUTO_INCREMENT NOT NULL, payement_method_code VARCHAR(255) NOT NULL, payement_method_description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ref_relationship_types (id INT AUTO_INCREMENT NOT NULL, relationship_type_code VARCHAR(255) NOT NULL, relation_type_description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_addresses (id INT AUTO_INCREMENT NOT NULL, address_type_code_id INT NOT NULL, student_id INT NOT NULL, address_id INT NOT NULL, date_address_from DATE NOT NULL, date_address_to DATE DEFAULT NULL, monthly_rental VARCHAR(255) NOT NULL, other_details LONGTEXT DEFAULT NULL, INDEX IDX_8A4B49635A45F9 (address_type_code_id), INDEX IDX_8A4B496CB944F1A (student_id), INDEX IDX_8A4B496F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_class_registrations (id INT AUTO_INCREMENT NOT NULL, student_id INT NOT NULL, class_id INT NOT NULL, date_of_registration DATETIME NOT NULL, date_of_first_class DATE DEFAULT NULL, date_of_last_class DATE DEFAULT NULL, other_details LONGTEXT DEFAULT NULL, INDEX IDX_13D0F935CB944F1A (student_id), INDEX IDX_13D0F935EA000B10 (class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE students_payement_methods (id INT AUTO_INCREMENT NOT NULL, payement_method_code_id INT NOT NULL, student_id INT NOT NULL, bank_details VARCHAR(255) DEFAULT NULL, card_details VARCHAR(255) NOT NULL, other_details LONGTEXT DEFAULT NULL, INDEX IDX_E5A91BE8F90D72C9 (payement_method_code_id), INDEX IDX_E5A91BE8CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE students_relationships (id INT AUTO_INCREMENT NOT NULL, student_id INT NOT NULL, person_id INT NOT NULL, relationship_type_code_id INT NOT NULL, INDEX IDX_B87A9D48CB944F1A (student_id), INDEX IDX_B87A9D48217BBB47 (person_id), INDEX IDX_B87A9D488A556174 (relationship_type_code_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE addresses ADD CONSTRAINT FK_6FCA7516D48E7AED FOREIGN KEY (landlord_id) REFERENCES property_owners (id)');
        $this->addSql('ALTER TABLE parents_and_guardians ADD CONSTRAINT FK_2FBF57D1F5B7AF75 FOREIGN KEY (address_id) REFERENCES addresses (id)');
        $this->addSql('ALTER TABLE student_addresses ADD CONSTRAINT FK_8A4B49635A45F9 FOREIGN KEY (address_type_code_id) REFERENCES ref_address_types (id)');
        $this->addSql('ALTER TABLE student_addresses ADD CONSTRAINT FK_8A4B496CB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE student_addresses ADD CONSTRAINT FK_8A4B496F5B7AF75 FOREIGN KEY (address_id) REFERENCES addresses (id)');
        $this->addSql('ALTER TABLE student_class_registrations ADD CONSTRAINT FK_13D0F935CB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE student_class_registrations ADD CONSTRAINT FK_13D0F935EA000B10 FOREIGN KEY (class_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE students_payement_methods ADD CONSTRAINT FK_E5A91BE8F90D72C9 FOREIGN KEY (payement_method_code_id) REFERENCES ref_payement_methods (id)');
        $this->addSql('ALTER TABLE students_payement_methods ADD CONSTRAINT FK_E5A91BE8CB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE students_relationships ADD CONSTRAINT FK_B87A9D48CB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE students_relationships ADD CONSTRAINT FK_B87A9D48217BBB47 FOREIGN KEY (person_id) REFERENCES parents_and_guardians (id)');
        $this->addSql('ALTER TABLE students_relationships ADD CONSTRAINT FK_B87A9D488A556174 FOREIGN KEY (relationship_type_code_id) REFERENCES ref_relationship_types (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parents_and_guardians DROP FOREIGN KEY FK_2FBF57D1F5B7AF75');
        $this->addSql('ALTER TABLE student_addresses DROP FOREIGN KEY FK_8A4B496F5B7AF75');
        $this->addSql('ALTER TABLE student_class_registrations DROP FOREIGN KEY FK_13D0F935EA000B10');
        $this->addSql('ALTER TABLE students_relationships DROP FOREIGN KEY FK_B87A9D48217BBB47');
        $this->addSql('ALTER TABLE addresses DROP FOREIGN KEY FK_6FCA7516D48E7AED');
        $this->addSql('ALTER TABLE student_addresses DROP FOREIGN KEY FK_8A4B49635A45F9');
        $this->addSql('ALTER TABLE students_payement_methods DROP FOREIGN KEY FK_E5A91BE8F90D72C9');
        $this->addSql('ALTER TABLE students_relationships DROP FOREIGN KEY FK_B87A9D488A556174');
        $this->addSql('DROP TABLE addresses');
        $this->addSql('DROP TABLE classes');
        $this->addSql('DROP TABLE parents_and_guardians');
        $this->addSql('DROP TABLE property_owners');
        $this->addSql('DROP TABLE ref_address_types');
        $this->addSql('DROP TABLE ref_payement_methods');
        $this->addSql('DROP TABLE ref_relationship_types');
        $this->addSql('DROP TABLE student_addresses');
        $this->addSql('DROP TABLE student_class_registrations');
        $this->addSql('DROP TABLE students_payement_methods');
        $this->addSql('DROP TABLE students_relationships');
    }
}
