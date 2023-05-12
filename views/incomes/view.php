<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Incomes $model */

$this->title = $model->type_of_incomes;
$this->params['breadcrumbs'][] = ['label' => 'incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="incomes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type_of_incomes',
            'amount',
            'date',
            'description:ntext',
            'car_id',
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
