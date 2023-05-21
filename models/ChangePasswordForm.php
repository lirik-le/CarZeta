<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ChangePasswordForm extends Model
{
    public $old_password;
    public $new_password;
    public $confirm_password;

    public function rules()
    {
        return [
            [['old_password', 'new_password', 'confirm_password'], 'required'],
            ['old_password', 'validateOldPassword'],
            [['new_password', 'confirm_password'], 'string', 'max' => 60],
            [
                ['new_password'],'match',
                'pattern'=> '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
            ],
            ['confirm_password', 'compare', 'compareAttribute' => 'new_password'],

        ];
    }

    public function validateOldPassword($attribute, $params)
    {
        if (!Yii::$app->security->validatePassword($this->old_password, Yii::$app->user->identity->password)) {
            $this->addError($attribute, 'Неверный старый пароль.');
        }
    }

    public function attributeLabels()
    {
        return [
            'old_password' => 'Старый пароль',
            'new_password' => 'Новый пароль',
            'confirm_password' => 'Повтор пароля',
        ];
    }
}