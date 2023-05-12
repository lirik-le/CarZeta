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
 * @property User $user
 */
class Car extends \yii\db\ActiveRecord
{
    public $file;
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
            [['name', 'brand', 'model', 'file', 'user_id'], 'required'],
            [['year'], 'safe'],
            [['user_id'], 'integer'],
            [['name', 'brand', 'model', 'number', 'photo', 'mileage'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function upload()
    {
        if (!$this->file)
            return false;
        $name = '/web/uploads/car/' . time() . rand(0, 100) . '.' . $this->file->extension;
        $filename = Yii::getAlias('@webroot') . $name;
        $url = Yii::getAlias('@web') . $name;
        if ($this->file->saveAs($filename))
            return $url;
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => 'Имя',
            'brand' => 'Марка',
            'model' => 'Модель',
            'number' => 'Номер',
            'year' => 'Год',
            'photo' => 'Фото',
            'mileage' => 'Пробег',
            'user_id' => 'Владелец',
        ];

    }

    /**
     * Gets query for [[expenditures]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpenditures()
    {
        return $this->hasMany(Expenditures::class, ['car_id' => 'id']);
    }

    /**
     * Gets query for [[incomes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIncomes()
    {
        return $this->hasMany(Incomes::class, ['car_id' => 'id']);
    }

    /**
     * Gets query for [[refills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefills()
    {
        return $this->hasMany(Refills::class, ['car_id' => 'id']);
    }

    /**
     * Gets query for [[services]].
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
