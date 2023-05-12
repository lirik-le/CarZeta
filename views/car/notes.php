<?php
$this->title = 'Записи';
?>

<div class="notes">
    <div class="menu">
        <div>
            <a href="">
                <button class="button green">Добавит</button>
            </a>
            <a href="">
                <button class="button green">Доход</button>
            </a>
            <a href="">
                <button class="button red">Расход</button>
            </a>
            <a href="">
                <button class="button gray">Сервис</button>
            </a>
            <a href="">
                <button class="button yellow">Заправка</button>
            </a>
        </div>
        <div>
            <input type="text">
        </div>
    </div>

    <div class="notes-list">
        <div class="note">
            <div>
                <img class="note-img" src="<?= Yii::$app->homeUrl ?>/web/img/refill.png" alt="Доход">
            </div>
            <div class="note-info">
                <div class="note-header">
                    <p>Заправка</p>
                    <div>
                        <p>19.02.2023</p>
                        <p>2000р</p>
                    </div>
                </div>
                <div class="note-footer">
                    <p>Бензин 24 литра</p>
                    <div>
                        <a href="">
                            <button class="button green">Изменить</button>
                        </a>
                        <a href="">
                            <button class="button red">Удалить</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
