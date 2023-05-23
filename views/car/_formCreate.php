<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Car $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="form-box">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'form',
        'fieldConfig' => [
            'template' => "{input}\n{error}",
            'inputOptions' => ['class' => 'input-form'],
            'errorOptions' => ['class' => 'input-error'],
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder'=>'Имя']) ?>
    <?= $form->field($model, 'brand')->textInput(['maxlength' => true, 'placeholder'=>'Марка']) ?>
    <?= $form->field($model, 'model')->textInput(['maxlength' => true, 'placeholder'=>'Модель']) ?>
    <?= $form->field($model, 'number')->textInput(['maxlength' => true, 'placeholder'=>'А001АА01']) ?>
    <?= $form->field($model, 'year')->textInput(['type' => 'number', 'maxlength' => true, 'placeholder'=>'Год']) ?>
    <?= $form->field($model, 'mileage')->textInput(['type' => 'number','maxlength' => true, 'placeholder'=>'Пробег']) ?>
    <?= $form->field($model, 'file', ['enableAjaxValidation' => false])->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' =>'button green']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
