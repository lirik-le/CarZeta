<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Refills $model */

$this->title = 'Изменение заправки: ' . $model->date;
$this->params['breadcrumbs'][] = ['label' => 'refills', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="refills-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
