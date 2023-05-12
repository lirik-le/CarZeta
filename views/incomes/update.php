<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Incomes $model */

$this->title = 'Изменение: ' . $model->type_of_incomes;
$this->params['breadcrumbs'][] = ['label' => 'incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="incomes-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
