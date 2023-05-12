<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Refills $model */

$this->title = 'Добавление заправки';
$this->params['breadcrumbs'][] = ['label' => 'refills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refills-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
