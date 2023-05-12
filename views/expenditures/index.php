<?php

use app\models\Expenditures;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Доходы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expenditures-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type_of_expenditures',
            'amount',
            'date',
            'description:ntext',
            'car_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Expenditures $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
