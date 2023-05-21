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
            [['car_id'], 'integer'],
            [['amount'], 'string', 'max' => 6],
            [['amount'], 'compare', 'operator' => '>=', 'compareValue' => 0],
            [['date'], 'safe'],
            [['date'], 'compare', 'operator' => '<=', 'compareValue' => date('Y-m-d')],
            [['date'], 'compare', 'operator' => '>=', 'compareValue' => '2020-01-01'],
            [['type_of_incomes'], 'string', 'max' => 40],
            [['description'], 'string', 'max' => 40],
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
            'type_of_incomes' => 'Название',
            'amount' => 'Цена',
            'date' => 'Дата',
            'description' => 'Описание',
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
}
