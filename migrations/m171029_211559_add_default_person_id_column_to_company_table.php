<?php

use yii\db\Migration;

/**
 * Handles adding default_person_id to table `company`.
 * Has foreign keys to the tables:
 *
 * - `person`
 */
class m171029_211559_add_default_person_id_column_to_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('company', 'default_person_id', $this->integer(11));

        // creates index for column `default_person_id`
        $this->createIndex(
            'idx-company-default_person_id',
            'company',
            'default_person_id'
        );

        // add foreign key for table `person`
        $this->addForeignKey(
            'fk-company-default_person_id',
            'company',
            'default_person_id',
            'person',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `person`
        $this->dropForeignKey(
            'fk-company-default_person_id',
            'company'
        );

        // drops index for column `default_person_id`
        $this->dropIndex(
            'idx-company-default_person_id',
            'company'
        );

        $this->dropColumn('company', 'default_person_id');
    }
}
