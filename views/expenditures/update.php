<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Expenditures $model */

$this->title = 'Изменение: ' . $model->type_of_expenditures;
$this->params['breadcrumbs'][] = ['label' => 'expenditures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expenditures-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
