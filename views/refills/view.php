<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Refills $model */

$this->title = $model->fuel->fuel;
$this->params['breadcrumbs'][] = ['label' => 'refills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="refills-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'amount',
            'id_fuel',
            'liters',
            'date',
            "id_fuel",
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
