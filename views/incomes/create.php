<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Incomes $model */

$this->title = 'Create incomes';
$this->params['breadcrumbs'][] = ['label' => 'incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incomes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
