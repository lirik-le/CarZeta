<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Refills $model */

$this->title = 'Update Refills: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Refills', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="refills-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
