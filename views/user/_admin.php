<?php

use yii\helpers\Url;

?>

<div class="adm">
    <h1>Админ панель</h1>
    <div class="adm-main">
        <p>Основное</p>
        <a href="<?= Url::to(['user/index']) ?>" data-method="post">
            <button class="button green">Пользователи</button>
        </a>
        <a href="<?= Url::to(['car/index']) ?>" data-method="post">
            <button class="button gray">Машины</button>
        </a>
    </div>
    <div class="adm-note">
        <p>Записи</p>
        <a href="<?= Url::to(['incomes/index']) ?>" data-method="post">
            <button class="button green">Доходы</button>
        </a>
        <a href="<?= Url::to(['expenditures/index']) ?>" data-method="post">
            <button class="button red">Расходы</button>
        </a>
        <a href="<?= Url::to(['services/index']) ?>" data-method="post">
            <button class="button gray">Сервисы</button>
        </a>
        <a href="<?= Url::to(['refills/index']) ?>" data-method="post">
            <button class="button yellow">Заправки</button>
        </a>
        <a href="<?= Url::to(['fuel-types/index']) ?>" data-method="post">
            <button class="button green">Типы топлива</button>
        </a>
    </div>
</div>

