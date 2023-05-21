<?php

use yii\helpers\Url;

?>

<div class="reports">
    <h1>Статистика</h1>
    <div>
        <div class="reports-menu">
            <div>
                <a class="reports-link" href="<?= Url::to('reports') ?>">
                    <img src="<?= Yii::$app->homeUrl ?>/web/img/stat.png" alt="" width="50" height="50">
                    <span class="reports-stat">Полная статистика</span>
                </a>
            </div>
            <div>
                <a class="reports-link" href="<?= Url::to('refill') ?>">
                    <img src="<?= Yii::$app->homeUrl ?>/web/img/report-refill.png" alt="" width="50" height="50">
                    <span class="reports-refill">Заправки</span>
                </a>
            </div>
            <div>
                <a class="reports-link" href="<?= Url::to('income') ?>">
                    <img src="<?= Yii::$app->homeUrl ?>/web/img/report-income.png" alt="" width="50" height="50">
                    <span class="reports-income">Доходы</span>
                </a>
            </div>
            <div>
                <a class="reports-link" href="<?= Url::to('expenditure') ?>">
                    <img src="<?= Yii::$app->homeUrl ?>/web/img/report-expenditure.png" alt="" width="50" height="50">
                    <span class="reports-expenditure">Расходы</span>
                </a>
            </div>
            <div>
                <a class="reports-link" href="<?= Url::to('service') ?>">
                    <img src="<?= Yii::$app->homeUrl ?>/web/img/report-service.png" alt="" width="50" height="50">
                    <span class="reports-service">Сервисы</span>
                </a>
            </div>
        </div>
        <div class="stat">
            <div>
                <a href="">За месяц</a> |
                <a href="">За 3 месяца</a> |
                <a href="">За 6 месяцев</a> |
                <a href="">За год</a>
            </div>
            <div>
                <h2>Всего</h2>
                <div class="stat-inner">
                    <h3>152333</h3>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</div>