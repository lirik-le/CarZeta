<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FuelTypes $model */

$this->title = 'Изменение: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fuel Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fuel-types-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div> 
