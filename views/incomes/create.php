<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Incomes $model */

$this->title = 'Добавление дохода';
$this->params['breadcrumbs'][] = ['label' => 'incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incomes-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
