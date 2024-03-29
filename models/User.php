<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

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
 * @property Car[] $cars
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $repeat_password;
    public $file;

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
            [['lastname', 'firstname', 'username', 'password', 'number', 'email', 'file', 'role'], 'required'],
            [['role'], 'integer'],
            [['lastname', 'firstname', 'username', 'number',], 'string', 'max' => 50],
            [['number',], 'string', 'max' => 11],
            [['password',], 'string', 'max' => 60],
            [['email', 'avatar'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['username', 'email', 'number'], 'unique'],
            [
                ['username'],'match',
                'pattern'=> '/^[a-zA-Z \W \d]+$/u'
            ],
            [
                ['password'],'match',
                'pattern'=> '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
            ],
            [
                ['lastname', 'firstname'],'match',
                'pattern'=> '/^[а-яА-Я]+$/u'
            ],
            [['repeat_password'], 'compare', 'compareAttribute' => 'password'],
            [
                ['file'], 'file',
                'skipOnEmpty' => false,
                'extensions' => 'jpg, png, jpeg, bmp', 'maxSize' => 1024 * 1024 * 15
            ]
        ];
    }

    public function upload()
    {
        if (!$this->file)
            return false;
        $name = '/web/uploads/user/' . time() . rand(0, 100) . '.' . $this->file->extension;
        $filename = Yii::getAlias('@webroot') . $name;
        $url = Yii::getAlias('@web') . $name;
        if ($this->file->saveAs($filename))
            return $url;
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'lastname' => 'Фамилия',
            'firstname' => 'Имя',
            'username' => 'Логин',
            'password' => 'Пароль',
            'number' => 'Номер',
            'email' => 'Почта',
            'avatar' => 'Аватарка',
            'role' => 'Роль',
            'repeat_password' => 'Повторите пароль',
            'file' => 'Аватар',
        ];
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::class, ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {

    }
}
