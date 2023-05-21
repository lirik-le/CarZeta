<?php

use yii\helpers\Url;

?>
    <div class="cars">
    <div>
        <h1>Список моих автомобилей</h1>
        <a href="<?= Url::to(['car/create']) ?>" data-method="post">
            <button class="button green">Добавить</button>
        </a>
    </div>

<?php foreach ($cars as $car): ?>
    <div class="car">
        <div class="avatar">
            <a href="<?= Url::to(['car/photo', 'id' => $car->id]) ?>">
                <img class="gear" src="<?= Yii::$app->homeUrl ?>web/img/gear.png" alt="Сменить" width="33" height="33">
            </a>
            <img src="<?= $car->photo ?>" alt="Фотография" width="384" height="216">
        </div>

        <div>
            <h2><?= $car->name ?></h2>
            <p><?= $car->brand ?> <?= $car->model ?></p>
            <p><?= $car->number ?></p>
            <p><?= $car->year ?> год</p>
            <p><?= $car->mileage ?> км</p>
            <div>
                <a href="<?= Url::to(['car/notes', 'car_id' => $car->id]) ?>">
                    <button class="button green">Записи</button>
                </a>
                <a href="<?= Url::to(['car/update', 'id' => $car->id]) ?>">
                    <button class="button gray">Изменить</button>
                </a>
                <a href="<?= Url::to(['car/delete', 'id' => $car->id]) ?>" data-method="post">
                    <img src="<?= Yii::$app->homeUrl ?>/web/img/bin.png" alt="Удалить" width="30">
                </a>
            </div>
        </div>
    </div>
    </div>

<?php endforeach ?>