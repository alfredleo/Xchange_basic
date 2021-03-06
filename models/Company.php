<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property int $default_person_id
 *
 * @property Person $defaultPerson
 * @property Person[] $people
 */
class Company extends \yii\db\ActiveRecord
{
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_DELETED = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'default_person_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['name'], 'unique'],
            [['default_person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['default_person_id' => 'id']],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => array_keys(self::statuses())],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'status' => Yii::t('app', 'Status'),
            'default_person_id' => Yii::t('app', 'Default Person'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDefaultPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'default_person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['company_id' => 'id']);
    }

    /**
     * Returns company statuses list
     * @return array|mixed
     */
    public static function statuses()
    {
        return [
            self::STATUS_NOT_ACTIVE => Yii::t('app', 'Not Active'),
            self::STATUS_ACTIVE => Yii::t('app', 'Active'),
            self::STATUS_DELETED => Yii::t('app', 'Deleted')
        ];
    }
}
