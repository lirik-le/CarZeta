<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Car $model */

$this->title = 'Создание машины';
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
