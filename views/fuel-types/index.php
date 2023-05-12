<?php

use app\models\FuelTypes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Типы топлива';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuel-types-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <a href="<?= Url::to(['create']) ?>">
            <button class="button green">Добавить</button>
        </a>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fuel',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, FuelTypes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
