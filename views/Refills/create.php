<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Refills $model */

$this->title = 'Create Refills';
$this->params['breadcrumbs'][] = ['label' => 'Refills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refills-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
