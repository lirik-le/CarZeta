<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */

$this->title = 'Регистрация';
?>

<div class="form-box">
    <h1>Регистрация</h1>

    <?php $form = ActiveForm::begin([
        'id' => 'form',
        'enableAjaxValidation' => true,
        'fieldConfig' => [
            'template' => "{input}\n{error}",
            'inputOptions' => ['class' => 'input-form'],
            'errorOptions' => ['class' => 'input-error'],
        ],
    ]); ?>

    <?= $form->field($model, 'lastname')->textInput(['placeholder' => 'Фамилия']) ?>
    <?= $form->field($model, 'firstname')->textInput(['placeholder' => 'Имя']) ?>
    <?= $form->field($model, 'username')->textInput(['placeholder' => 'Логин']) ?>
    <?= $form->field($model, 'number')->textInput(['placeholder' => 'Номер телефона']) ?>
    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Почта']) ?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль']) ?>
    <?= $form->field($model, 'repeat_password')->passwordInput(['placeholder' => 'Повтор пароля']) ?>
    <?= $form->field($model, 'file', ['enableAjaxValidation' => false])->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'button green', 'style' => 'width: 280px']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>