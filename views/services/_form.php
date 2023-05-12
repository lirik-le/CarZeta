<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Services $model */
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

    <?= $form->field($model, 'type_of_services')->textInput(['placeholder' => 'Название','maxlength' => true]) ?>
    <?= $form->field($model, 'amount')->textInput(['placeholder' => 'Цена']) ?>
    <?= $form->field($model, 'date')->input('date') ?>
    <?= $form->field($model, 'description')->textarea(['placeholder' => 'Описание', 'rows' => 1]) ?>
    <?= $form->field($model, 'car_id')->input('hidden') ?>

    <div class="form-group">
        <?= Html::submitButton('Записать    ', ['class' => 'button green']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
