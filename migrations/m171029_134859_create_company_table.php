<?php

use yii\db\Migration;

/**
 * yii migrate/create create_company_table --fields="name:string(100):notNull:unique,status:integer(2):defaultValue(1)"
 *
 * Handles the creation of table `company`.
 */
class m171029_134859_create_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
            'status' => $this->integer(2)->defaultValue(1),
        ], Yii::$app->migrationCommon->getInnodbTable());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('company');
    }
}
