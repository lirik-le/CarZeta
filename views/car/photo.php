<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Car $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="form-box">

    <h1>Изменение фото</h1>

    <?php $form = ActiveForm::begin([
        'id' => 'form',
        'fieldConfig' => [
            'template' => "{input}\n{error}",
            'inputOptions' => ['class' => 'input-form'],
            'errorOptions' => ['class' => 'input-error'],
        ],
    ]); ?>

    <?= $form->field($model, 'file', ['enableAjaxValidation' => false])->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' =>'button green']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
