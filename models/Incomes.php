<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "incomes".
 *
 * @property int $id
 * @property string $type_of_incomes
 * @property int $amount
 * @property string $date
 * @property string|null $description
 * @property int $car_id
 *
 * @property Car $car
 */
class Incomes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'incomes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_of_incomes', 'amount', 'date', 'car_id'], 'required'],
            [['amount', 'car_id'], 'integer'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['type_of_incomes'], 'string', 'max' => 255],
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
            'type_of_incomes' => 'Type Of incomes',
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
