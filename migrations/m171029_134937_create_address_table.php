<?php

use yii\db\Migration;

/**
 * yii migrate/create create_address_table --fields="person_id:primaryKey:notNull:foreignKey(person),
 * address:string(100):notNull,address2:string(100),city:string(100),status:integer(2):defaultValue(1)"
 *
 * Handles the creation of table `address`.
 * Has foreign keys to the tables:
 *
 * - `person`
 */
class m171029_134937_create_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('address', [
            'person_id' => $this->primaryKey()->notNull(),
            'address' => $this->string(100)->notNull(),
            'address2' => $this->string(100),
            'city' => $this->string(100),
            'status' => $this->integer(2)->defaultValue(1),
        ], Yii::$app->migrationCommon->getInnodbTable());

        // creates index for column `person_id`
        $this->createIndex(
            'idx-address-person_id',
            'address',
            'person_id'
        );

        // add foreign key for table `person`
        $this->addForeignKey(
            'fk-address-person_id',
            'address',
            'person_id',
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
            'fk-address-person_id',
            'address'
        );

        // drops index for column `person_id`
        $this->dropIndex(
            'idx-address-person_id',
            'address'
        );

        $this->dropTable('address');
    }
}
