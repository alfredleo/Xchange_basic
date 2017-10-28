<?php
/**
 * Created by PhpStorm.
 * User: Alfred
 * Date: 29.10.2017
 * Time: 0:25
 */

namespace app\commands;

use yii\base\Module;
use yii\console\Controller;

class TablesController extends Controller
{
    private static $dbName;
    private static $db;

    /**
     * TablesController constructor.
     * @param string $id
     * @param Module $module
     * @param array $config
     */
    public function __construct($id, Module $module, array $config = [])
    {
        self::$db = \Yii::$app->db;
        self::$dbName = $this->getDsnAttribute(self::$db->dsn, 'dbname');
        parent::__construct($id, $module, $config);
    }

    /**
     * Truncates all tables in the database.
     */
    public function actionTruncate()
    {
        if ($this->confirm('This will truncate all tables of current database [' . self::$dbName . '].')) {
            self::$db->createCommand('SET FOREIGN_KEY_CHECKS=0')->execute();
            $command = self::$db->createCommand("SHOW FULL TABLES WHERE TABLE_TYPE LIKE '%TABLE'");
            $res = $command->queryAll();
            foreach ($res as $row) {
                $rowName = 'Tables_in_' . self::$dbName;
                echo 'Truncating table ' . $row[$rowName] . PHP_EOL;
                self::$db->createCommand()->truncateTable($row[$rowName])->execute();
            }
            self::$db->createCommand('SET FOREIGN_KEY_CHECKS=1')->execute();
        }
    }


    /**
     * Parses DNS string to find name of database
     * @param $name string, string to find
     * @param $dsn string, DNS string
     * @return null|string
     */
    private function getDsnAttribute($dsn, $name = 'dbname')
    {
        if (preg_match('/' . $name . '=([^;]*)/', $dsn, $match)) {
            return $match[1];
        } else {
            return null;
        }
    }


    /**
     * Drops all tables in the database.
     */
    public function actionDrop()
    {
        if ($this->confirm('This will drop all tables of current database [' . self::$dbName . '].')) {
            self::$db->createCommand("SET foreign_key_checks = 0")->execute();
            $tables = self::$db->schema->getTableNames();
            foreach ($tables as $table) {
                echo 'Dropping table ' . $table . PHP_EOL;
                self::$db->createCommand()->dropTable($table)->execute();
            }
            self::$db->createCommand("SET foreign_key_checks = 1")->execute();
        }
    }
}
