<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fuel_types".
 *
 * @property int $id
 * @property string $fuel
 *
 * @property Refills[] $refills
 */
class FuelTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fuel_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fuel'], 'required'],
            [['fuel'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fuel' => 'Fuel',
        ];
    }

    /**
     * Gets query for [[refills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefills()
    {
        return $this->hasMany(Refills::class, ['id_fuel' => 'id']);
    }
}
