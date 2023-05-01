<?php

use yii\helpers\Url;

/** @var yii\web\View $this */

$this->registerCss('
* {
    color: white;
}

header {
    border-bottom: none;
}

a {
    color: white;
}
');

$this->title = 'CarZeta';
?>
<div>
    <div class="index">
        <div class="bg2"></div>
        <div>
            <h1>Быстро и легко веди учет за своим авто!</h1>
            <p>Сайт позволяет делать записи основных действий с автомобилем: расходы, доходы, сервис и заправка.
                Также можно получит статистику за выбранный период времении многое другое</p>
        </div>
        <div>
            <?php if (Yii::$app->user->isGuest): ?>
                <a class="button-index" href="<?= Url::to(['site/register']) ?>">Начать пользоваться</a>
                <p>Простые шаги по регистрации</p>
            <?php else: ?>
                <a class="button-index" href="<?= Url::to(['user/profile']) ?>">Выбрать автомобиль</a>
                <p>Простые шаги по добавлению записи</p>
            <?php endif ?>
        </div>
    </div>
    <div class="footer"><div class="bg"></div>&#169; ООО "CarZeta"</div>
</div>