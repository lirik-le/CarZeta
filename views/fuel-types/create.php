<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FuelTypes $model */

$this->title = 'Create Fuel Types';
$this->params['breadcrumbs'][] = ['label' => 'Fuel Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
