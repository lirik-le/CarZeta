<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Expenditures $model */

$this->title = 'Добавление расхода';
$this->params['breadcrumbs'][] = ['label' => 'expenditures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expenditures-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
