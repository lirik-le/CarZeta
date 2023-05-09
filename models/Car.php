<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property string $name
 * @property string $brand
 * @property string $model
 * @property string|null $number
 * @property string|null $year
 * @property string $photo
 * @property string|null $mileage
 * @property int $user_id
 *
 * @property Expenditures[] $expenditures
 * @property Incomes[] $incomes
 * @property Refills[] $refills
 * @property Services[] $services
 * @property Users $user
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'brand', 'model', 'photo', 'user_id'], 'required'],
            [['year'], 'safe'],
            [['user_id'], 'integer'],
            [['name', 'brand', 'model', 'number', 'photo', 'mileage'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'brand' => 'Brand',
            'model' => 'Model',
            'number' => 'Number',
            'year' => 'Year',
            'photo' => 'Photo',
            'mileage' => 'Mileage',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Expenditures]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpenditures()
    {
        return $this->hasMany(Expenditures::class, ['car_id' => 'id']);
    }

    /**
     * Gets query for [[Incomes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIncomes()
    {
        return $this->hasMany(Incomes::class, ['car_id' => 'id']);
    }

    /**
     * Gets query for [[Refills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefills()
    {
        return $this->hasMany(Refills::class, ['car_id' => 'id']);
    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Services::class, ['car_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
