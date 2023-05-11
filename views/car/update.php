<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Car $model */

$this->title = 'Изменение: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
