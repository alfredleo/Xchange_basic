<?php

use yii\db\Migration;

/**
 * yii migrate/create create_person_table --fields="first_name:string(100):notNull,last_name:string(100):notNull,
 * status:integer(2):defaultValue(1),company_id:integer(11):foreignKey(company),default_person:boolean:defaultValue(0)"
 *
 * Handles the creation of table `person`.
 * Has foreign keys to the tables:
 *
 * - `company`
 */
class m171029_134916_create_person_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('person', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(100)->notNull(),
            'last_name' => $this->string(100)->notNull(),
            'status' => $this->integer(2)->defaultValue(1),
            'company_id' => $this->integer(11),
            'default_person' => $this->boolean()->defaultValue(0),
        ], Yii::$app->migrationCommon->getInnodbTable());

        // creates index for column `company_id`
        $this->createIndex(
            'idx-person-company_id',
            'person',
            'company_id'
        );

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-person-company_id',
            'person',
            'company_id',
            'company',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `company`
        $this->dropForeignKey(
            'fk-person-company_id',
            'person'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            'idx-person-company_id',
            'person'
        );

        $this->dropTable('person');
    }
}
