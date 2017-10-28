<?php

namespace app\components\migrations;

use yii\base\Component;

/**
 * Migrations component class.
 * class MigrationCommon
 * @package app\components\migrations
 */
class MigrationCommon extends Component
{
    private static $innodbTable;

    /**
     * @return string
     */
    public static function getInnodbTable()
    {
        if (\Yii::$app->db->driverName === 'mysql') {
            self::$innodbTable = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        } else self::$innodbTable = '';
        return self::$innodbTable;
    }


}