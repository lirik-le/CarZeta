<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\widgets\ActiveForm $form */

if (isset(Yii::$app->request->getQueryParams()['date']))
    $date = Yii::$app->request->getQueryParams()['date'];
else
    $date = date('Y-m-d');
?>

<div class="filter">

    <?php $form = ActiveForm::begin([
        'action' => ['notes'],
        'method' => 'get',
    ]);
    ?>

    <?= Html::input('hidden', 'car_id', "$car_id", ['class' => 'input-form']) ?>

    <?= Html::dropDownList('category', '', [
        'refills' => 'Заправки',
        'incomes' => 'Доходы',
        'expenditures' => 'Расходы',
        'services' => 'Сервисы',
    ], ['class' => 'input-form', 'prompt' => 'Все категории', 'style' => 'width: 180px']) ?>

    <?= Html::input('date', 'date', "$date", ['class' => 'input-form']) ?>

    <button class="none">
        <img src="<?= Yii::$app->homeUrl ?>/web/img/search.png" alt="" width="30">
    </button>
    <a href="<?= Url::to("notes?car_id=$car_id") ?>">
        <img src="<?= Yii::$app->homeUrl ?>/web/img/refresh.png" alt="" width="28">
    </a>

    <?php ActiveForm::end(); ?>
</div>