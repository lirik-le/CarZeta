<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $lastname
 * @property string $firstname
 * @property string $username
 * @property string $password
 * @property string $number
 * @property string $email
 * @property string $avatar
 * @property int $role
 *
 * @property Cars[] $cars
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lastname', 'firstname', 'username', 'password', 'number', 'email', 'avatar', 'role'], 'required'],
            [['role'], 'integer'],
            [['lastname', 'firstname', 'username', 'password', 'number', 'email', 'avatar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lastname' => 'Фамилия',
            'firstname' => 'Имя',
            'username' => 'Логин',
            'password' => 'Пароль',
            'number' => 'Номер',
            'email' => 'Почта',
            'avatar' => 'Аватарка',
            'role' => 'Роль',
        ];
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Cars::class, ['user_id' => 'id']);
    }
}
