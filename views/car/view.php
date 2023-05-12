<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Car $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'brand',
            'model',
            'number',
            'year',
            'photo:image',
            'mileage',
            'user_id',
        ],
    ]) ?>

    <p>
        <a href="<?= Url::to(['update', 'id' => $model->id]) ?>">
            <button class="button green">Изменить</button>
        </a>
        <a href="<?= Url::to(['delete', 'id' => $model->id]) ?>" data-method="post">
            <button class="button red">Удалить</button>
        </a>
    </p>

</div>
