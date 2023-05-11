<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $type_of_services
 * @property int $amount
 * @property string $date
 * @property string|null $description
 * @property int $car_id
 *
 * @property Car $car
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_of_services', 'amount', 'date', 'car_id'], 'required'],
            [['amount', 'car_id'], 'integer'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['type_of_services'], 'string', 'max' => 255],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::class, 'targetAttribute' => ['car_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_of_services' => 'Type Of Services',
            'amount' => 'Amount',
            'date' => 'Date',
            'description' => 'Description',
            'car_id' => 'Car ID',
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::class, ['id' => 'car_id']);
    }
}
