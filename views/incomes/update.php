<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Incomes $model */

$this->title = 'Update incomes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="incomes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
