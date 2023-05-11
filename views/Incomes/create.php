<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Incomes $model */

$this->title = 'Create Incomes';
$this->params['breadcrumbs'][] = ['label' => 'Incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incomes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
