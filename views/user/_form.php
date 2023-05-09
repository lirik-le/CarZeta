<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var ActiveForm $form */
?>

<div class="form-box">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
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
    <?= $form->field($model, 'password')->textInput(['placeholder' => 'Пароль']) ?>
    <?= $form->field($model, 'file', ['enableAjaxValidation' => false])->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'button green']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
