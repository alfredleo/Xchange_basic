<?php

use yii\db\Migration;

/**
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
