<?php

use yii\db\Migration;

/**
 * Handles dropping default_person from table `person`.
 */
class m171029_212119_drop_default_person_column_from_person_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('person', 'default_person');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('person', 'default_person', $this->boolean());
    }
}
