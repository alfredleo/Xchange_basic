<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $person_id
 * @property string $address
 * @property string $address2
 * @property string $city
 * @property int $status
 *
 * @property Person $person
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address'], 'required'],
            [['status'], 'integer'],
            [['address', 'address2', 'city'], 'string', 'max' => 100],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => Yii::t('app', 'Person ID'),
            'address' => Yii::t('app', 'Address'),
            'address2' => Yii::t('app', 'Address2'),
            'city' => Yii::t('app', 'City'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }
}
