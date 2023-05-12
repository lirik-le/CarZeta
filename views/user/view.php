<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'lastname',
            'firstname',
            'username',
            'password',
            'number',
            'email:email',
            'avatar:image',
            'role',
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
