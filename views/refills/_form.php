<?php

use app\models\FuelTypes;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Refills $model */
/** @var yii\widgets\ActiveForm $form */

$fuelTypes = FuelTypes::find()->all();

foreach ($fuelTypes as $key => $elem) {
    $items[$key+1] = $elem->fuel;
}
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

    <?= $form->field($model, 'amount')->textInput(['placeholder' => 'Сумма']) ?>
    <?= $form->field($model, 'id_fuel')->dropDownList($items, ['prompt' => 'Тип топлива...']) ?>
    <?= $form->field($model, 'liters')->textInput(['placeholder' => 'Литры']) ?>
    <?= $form->field($model, 'date')->input('date') ?>
    <?= $form->field($model, 'car_id')->input('hidden') ?>

    <div class="form-group">
        <?= Html::submitButton('Записать', ['class' => 'button green']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
