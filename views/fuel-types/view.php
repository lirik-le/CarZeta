<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\FuelTypes $model */

$this->title = $model->fuel;
$this->params['breadcrumbs'][] = ['label' => 'Fuel Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fuel-types-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fuel',
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
