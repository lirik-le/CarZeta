<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FuelTypes $model */

$this->title = 'Добавление топлива';
$this->params['breadcrumbs'][] = ['label' => 'Fuel Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel-types-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
