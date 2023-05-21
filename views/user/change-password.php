<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */

$this->title = 'Регистрация';
?>

<div class="form-box">
    <h1>Изменение пароля</h1>

    <?php $form = ActiveForm::begin([
        'id' => 'form',
        'enableAjaxValidation' => true,
        'fieldConfig' => [
            'template' => "{input}\n{error}",
            'inputOptions' => ['class' => 'input-form'],
            'errorOptions' => ['class' => 'input-error'],
        ],
    ]); ?>

    <?= $form->field($model, 'old_password')->passwordInput(['placeholder' => 'Старый пароль']) ?>
    <?= $form->field($model, 'new_password')->passwordInput(['placeholder' => 'Новый пароль']) ?>
    <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder' => 'Повтор пароля']) ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'button green', 'style' => 'width: 280px']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>