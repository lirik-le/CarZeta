<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="form-box">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lastname')->textInput(['placeholder' => 'Фамилия']) ?>
    <?= $form->field($model, 'firstname')->textInput(['placeholder' => 'Имя']) ?>
    <?= $form->field($model, 'username')->textInput(['placeholder' => 'Логин']) ?>
    <?= $form->field($model, 'number')->textInput(['placeholder' => 'Номер телефона']) ?>
    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Почта']) ?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль']) ?>
    <?= $form->field($model, 'file', ['enableAjaxValidation' => false])->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
