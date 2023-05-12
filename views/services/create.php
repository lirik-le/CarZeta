<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Services $model */

$this->title = 'Добавление сервиса';
$this->params['breadcrumbs'][] = ['label' => 'services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
