<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refills".
 *
 * @property int $id
 * @property int $amount
 * @property int $id_fuel
 * @property int $liters
 * @property string $date
 * @property int $car_id
 *
 * @property Car $car
 * @property FuelTypes $fuel
 */
class Refills extends \yii\db\ActiveRecord
{

    public $array;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'refills';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'id_fuel', 'liters', 'date', 'car_id'], 'required'],
            [['id_fuel', 'car_id'], 'integer'],
            [['amount'], 'string', 'max' => 6],
            [['amount'], 'compare', 'operator' => '>=', 'compareValue' => 0],
            [['liters'], 'string', 'max' => 3],
            [['liters'], 'compare', 'operator' => '>=', 'compareValue' => 0],
            [['date'], 'safe'],
            [['date'], 'compare', 'operator' => '<=', 'compareValue' => date('Y-m-d')],
            [['date'], 'compare', 'operator' => '>=', 'compareValue' => '2020-01-01'],
            [['id_fuel'], 'exist', 'skipOnError' => true, 'targetClass' => FuelTypes::class, 'targetAttribute' => ['id_fuel' => 'id']],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::class, 'targetAttribute' => ['car_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'amount' => 'Цена',
            'id_fuel' => 'Тип бензина',
            'liters' => 'Литры',
            'date' => 'Дата',
            'car_id' => 'Номер машины',
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

    /**
     * Gets query for [[Fuel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuel()
    {
        return $this->hasOne(FuelTypes::class, ['id' => 'id_fuel']);
    }
}
