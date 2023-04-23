<?php

/** @var yii\web\View $this */

$this->registerCss('
* {
    color: white;
}
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 1100px;
    margin: 0 auto;
    padding: 10px 0;
}

a {
    color: white;
    margin-left: 20px;
}
');

$this->title = 'My Yii Application';
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
            <a class="button" href="">Начать пользоваться</a>
            <p>Простые шаги по регистрации</p>
        </div>
    </div>
    <div class="footer"><div class="bg"></div>&#169; ООО "CarZeta"</div>
</div>