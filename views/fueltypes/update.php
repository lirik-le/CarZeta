<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FuelTypes $model */

$this->title = 'Update Fuel Types: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fuel Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fuel-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
