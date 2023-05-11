<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Expenditures $model */

$this->title = 'Create Expenditures';
$this->params['breadcrumbs'][] = ['label' => 'Expenditures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expenditures-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>